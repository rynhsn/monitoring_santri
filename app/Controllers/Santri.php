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

//        dd($data);
        return view('santri/index', $data);
    }
}
