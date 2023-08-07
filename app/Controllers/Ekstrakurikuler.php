<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EkstrakurikulerModel;
use App\Models\KoordinatorModel;

class Ekstrakurikuler extends BaseController
{
    protected EkstrakurikulerModel $ekskulModel;
    protected KoordinatorModel $koordinatorModel;

    public function __construct()
    {
        $this->ekskulModel = new EkstrakurikulerModel();
        $this->koordinatorModel = new KoordinatorModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Ekstrakurikuler',
            'ekskul' => $this->ekskulModel->getEkskul(),
            'koordinator' => $this->koordinatorModel->findAll(),
        ];
        return view('ekskul/index');
    }
}
