<?php

namespace App\Controllers;

use App\Models\LembagaModel;

class Home extends BaseController
{
    public function index()
    {
        $lembagaModel = new LembagaModel();
        $data = [
            'title' => 'Selamat Datang',
            'lembaga' => $lembagaModel->first(),
        ];

        return view('landing', $data);
    }
}
