<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class Kelas extends BaseController
{
    protected KelasModel $kelasModel;

        public function __construct()
    {
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kelas',
            'kelas' => $this->kelasModel->findAll(),
        ];
        return view('kelas/index', $data);
    }

    public function store()
    {
        $this->kelasModel->save($this->request->getVar());
        session()->setFlashdata('message', 'Kelas berhasil disimpan.');
        return redirect()->to('/kelas');
    }

    public function destroy($id)
    {
        $this->kelasModel->delete($id);
        session()->setFlashdata('message', 'Kelas berhasil dihapus.');
        return redirect()->to('/kelas');
    }
}
