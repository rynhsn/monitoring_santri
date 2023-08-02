<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LembagaModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class Lembaga extends BaseController
{
    protected $lembagaModel;

    public function __construct()
    {
        $this->lembagaModel = new LembagaModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Data Lembaga',
            'lembaga' => $this->lembagaModel->first(),
        ];

//        dd($data);
        return view('lembaga/index', $data);
    }

    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
    {
        $this->lembagaModel->update(1, $this->request->getVar());
        session()->setFlashdata('message', 'Info lembaga berhasil diperbarui.');
        return redirect()->to('/lembaga');
    }
}