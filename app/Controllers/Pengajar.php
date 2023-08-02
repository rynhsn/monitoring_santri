<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\PengajarModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Pengajar extends BaseController
{

    protected $pengajarModel;
    protected UserModel $userModel;
    protected $config;

    public function __construct()
    {
        $this->pengajarModel = new PengajarModel();
        $this->userModel = new UserModel();
        $this->config = config('Auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pengajar',
            'pengajar' => $this->pengajarModel->findAll(),
            'ketua' => $this->pengajarModel->where('is_ketua', 1)->first(),
        ];
        return view('pengajar/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pengajar Baru',
        ];
        return view('pengajar/create', $data);
    }


    public function update($id): string
    {
        $data = [
            'title' => 'Tambah Data Pengajar Baru',
            'pengajar' => $this->pengajarModel->getPengajarByNip($id),
        ];
        return view('pengajar/update', $data);
    }

    public function profileUpdate($id): RedirectResponse
    {
        $this->pengajarModel->save([
            'nip_pengajar' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'no_hp' => $this->request->getVar('no_hp'),
            'jk' => $this->request->getVar('jk'),
            'jabatan' => $this->request->getVar('jabatan'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('message', 'Data berhasil diubah.');
        return redirect()->to('/pengajar');
    }

    public function store()
    {
        $rules = [
            'nip_pengajar' => 'required|is_unique[pengajar.nip_pengajar]',
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

        if (!$this->userModel->withGroup('Pengajar')->protect(false)->save($user)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        $this->pengajarModel->save([
            'user_id' => $this->userModel->getInsertID(),
            'nip_pengajar' => $this->request->getVar('nip_pengajar'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'no_hp' => $this->request->getVar('no_hp'),
            'jk' => $this->request->getVar('jk'),
            'jabatan' => $this->request->getVar('jabatan'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('message', 'Data berhasil ditambahkan.');
        return redirect()->to('/pengajar');
    }

    //drop
    public function drop($id)
    {
        //ambil user_id
        $user_id = $this->pengajarModel->find($id)['user_id'];
        $this->pengajarModel->delete($id);
        $this->userModel->delete($user_id);
        session()->setFlashdata('message', 'Data berhasil dihapus.');
        return redirect()->to('/pengajar');
    }

    public function buatKetua($id)
    {
        //ubah is_ketua yang lain jadi 0
        $this->pengajarModel->ubahKetua($id);

        session()->setFlashdata('message', 'Data berhasil diubah.');
        return redirect()->to('/pengajar');
    }
}
