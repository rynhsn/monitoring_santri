<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\SantriModel;
use App\Models\WaliModel;

class Santri extends BaseController
{
    protected SantriModel $santriModel;
    protected KelasModel $kelasModel;
    protected WaliModel $waliModel;

    public function __construct()
    {
        $this->santriModel = new SantriModel();
        $this->kelasModel = new KelasModel();
        $this->waliModel = new WaliModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Santri',
            'santri' => $this->santriModel->getSantri(),
            'kelas' => $this->kelasModel->findAll(),
            'wali' => $this->waliModel->findAll(),
        ];
//dd($data['santri']);
        return view('santri/index', $data);
    }

    public function store()
    {
        if(!$this->santriModel->insert($this->request->getVar())){
            session()->setFlashdata('error', 'Data santri gagal disimpan.');
            return redirect()->back();
        }
        
        session()->setFlashdata('message', 'Data santri berhasil disimpan.');
        return redirect()->back();
    }
}
