<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\WaliModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use Myth\Auth\Password;

class Wali extends BaseController
{

    protected $waliModel;
    protected UserModel $userModel;
    protected $config;

    public function __construct()
    {
        $this->waliModel = new WaliModel();
        $this->userModel = new UserModel();
        $this->config = config('Auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Wali',
            'wali' => $this->waliModel->getWali(),
        ];

        return view('wali/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Wali Baru',
        ];
        return view('wali/create', $data);
    }


    public function update($id): string
    {
        $data = [
            'title' => 'Tambah Data Wali Baru',
            'wali' => $this->waliModel->getWaliByNik($id),
        ];
        return view('wali/update', $data);
    }

    public function profileUpdate($id): RedirectResponse
    {
        $this->waliModel->save([
            'nik_wali' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'no_hp' => $this->request->getVar('no_hp'),
            'jk' => $this->request->getVar('jk'),
            'alamat' => $this->request->getVar('alamat'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('message', 'Profil berhasil diubah.');
        return redirect()->back();
    }

    public function store()
    {
        $rules = [
            'nik_wali' => 'required|numeric|min_length[16]|max_length[16]|is_unique[wali.nik_wali]',
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required',
            'pass_confirm' => 'required|matches[password]',
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $allowedPostFields = array_merge(['password'], $this->config->validFields);
        $user = new User($this->request->getVar($allowedPostFields));
        $user->activate();

        if (!$this->userModel->withGroup('Wali')->protect(false)->save($user)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        $this->waliModel->save([
            'user_id' => $this->userModel->getInsertID(),
            'nik_wali' => $this->request->getVar('nik_wali'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'no_hp' => $this->request->getVar('no_hp'),
            'jk' => $this->request->getVar('jk'),
            'alamat' => $this->request->getVar('alamat'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('message', 'Data berhasil ditambahkan.');
        return redirect()->to('/wali');
    }

    //drop
    public function drop($id)
    {
        //ambil user_id
        $user_id = $this->waliModel->find($id)['user_id'];
        $this->waliModel->delete($id);
        $this->userModel->delete($user_id);
        session()->setFlashdata('message', 'Data berhasil dihapus.');
        return redirect()->to('/wali');
    }

    public function accountUpdate($id)
    {
        $rules = [
            'password' => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'password_hash' => Password::hash($this->request->getVar('password')),
            'reset_hash' => null,
            'reset_at' => null,
            'reset_expires' => null,
        ];
        $this->userModel->update($id, $data);

        session()->setFlashdata('message', 'Akun telah diperbarui.');
        return redirect()->back();
    }
}
