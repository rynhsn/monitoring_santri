<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\KoordinatorModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use Myth\Auth\Password;

class Koordinator extends BaseController
{

    protected $koordinatorModel;
    protected UserModel $userModel;
    protected $config;

    public function __construct()
    {
        $this->koordinatorModel = new KoordinatorModel();
        $this->userModel = new UserModel();
        $this->config = config('Auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Koordinator',
            'koordinator' => $this->koordinatorModel->findAll(),
            'ketua' => $this->koordinatorModel->where('is_ketua', 1)->first(),
        ];

        return view('koordinator/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Koordinator Baru',
        ];
        return view('koordinator/create', $data);
    }


    public function update($id): string
    {
        $data = [
            'title' => 'Tambah Data Koordinator Baru',
            'koordinator' => $this->koordinatorModel->getKoordinatorByNip($id),
        ];
        return view('koordinator/update', $data);
    }

    public function profileUpdate($id): RedirectResponse
    {
        $this->koordinatorModel->save([
            'nip_koordinator' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'no_hp' => $this->request->getVar('no_hp'),
            'jk' => $this->request->getVar('jk'),
            'jabatan' => $this->request->getVar('jabatan'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('message', 'Profil berhasil diubah.');
        return redirect()->back();
    }

    public function store()
    {
        $rules = [
            'nip_koordinator' => 'required|numeric|min_length[10]|max_length[10]|is_unique[koordinator.nip_koordinator]',
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

        if (!$this->userModel->withGroup('Koordinator')->protect(false)->save($user)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        $this->koordinatorModel->save([
            'user_id' => $this->userModel->getInsertID(),
            'nip_koordinator' => $this->request->getVar('nip_koordinator'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'no_hp' => $this->request->getVar('no_hp'),
            'jk' => $this->request->getVar('jk'),
            'jabatan' => $this->request->getVar('jabatan'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('message', 'Data berhasil ditambahkan.');
        return redirect()->to('/koordinator');
    }

    //drop
    public function drop($id)
    {
        //ambil user_id
        $user_id = $this->koordinatorModel->find($id)['user_id'];
        $this->koordinatorModel->delete($id);
        $this->userModel->delete($user_id);
        session()->setFlashdata('message', 'Data berhasil dihapus.');
        return redirect()->to('/koordinator');
    }

    public function buatKetua($id)
    {
        $this->koordinatorModel->ubahKetua($id);

        session()->setFlashdata('message', 'Proses berhasil.');
        return redirect()->to('/koordinator');
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
