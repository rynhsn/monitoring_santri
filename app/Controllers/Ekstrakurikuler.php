<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EkstrakurikulerModel;
use App\Models\KelasModel;
use App\Models\KoordinatorModel;

class Ekstrakurikuler extends BaseController
{
    protected EkstrakurikulerModel $ekskulModel;
    protected KoordinatorModel $koordinatorModel;
    protected KelasModel $kelasModel;

    public function __construct()
    {
        $this->ekskulModel = new EkstrakurikulerModel();
        $this->koordinatorModel = new KoordinatorModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Ekstrakurikuler',
        ];
        return view('ekstrakurikuler/index', $data);
    }

    //create
    public function create(){
        $data = [
            'title' => 'Tambah Ekstrakurikuler',
            'ekskul' => $this->ekskulModel->getEkskul(),
            'koordinator' => $this->koordinatorModel->findAll(),
            'kelas' => $this->kelasModel->findAll(),
        ];

        return view('ekstrakurikuler/create', $data);
    }

    public function history(){
        $data = [
            'title' => 'History Ekstrakurikuler',
            'ekskul' => $this->ekskulModel->getEkskul(),
            'koordinator' => $this->koordinatorModel->findAll(),
            'kelas' => $this->kelasModel->findAll(),
        ];

        return view('ekstrakurikuler/history', $data);
    }
}
