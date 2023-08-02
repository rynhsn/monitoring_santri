<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\SantriModel;

class Santri extends BaseController
{
    protected SantriModel $santriModel;
    protected KelasModel $kelasModel;

    public function __construct()
    {
        $this->santriModel = new SantriModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Santri',
            'santri' => $this->santriModel->getSantri(),
            'kelas' => $this->kelasModel->findAll(),
        ];

//        dd($data);
        return view('santri/index', $data);
    }
}
