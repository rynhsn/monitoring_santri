<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HafalanModel;
use App\Models\PengajarModel;
use App\Models\SantriModel;
use App\Models\WaliModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class Hafalan extends BaseController
{
    protected PengajarModel $pengajarModel;
    protected HafalanModel $hafalanModel;
    protected SantriModel $santriModel;
    protected WaliModel $waliModel;

    public function __construct()
    {
        $this->hafalanModel = new HafalanModel();
        $this->pengajarModel = new PengajarModel();
        $this->santriModel = new SantriModel();
        $this->waliModel = new WaliModel();
    }
    public function index(): string
    {
        $data = [
            'title' => 'Hafalan',
            'hafalan' => $this->hafalanModel->getHafalan(),
            'santri' => $this->santriModel->findAll(),
            'pengajar' => $this->pengajarModel->where('user_id', user_id())->first(),
        ];
        if(in_groups('Wali')){
            $wali  = $this->waliModel->where('user_id',  user_id())->first();
            $data['santri'] = $this->santriModel->where('wali_nik',  $wali['nik_wali'])->findAll();
//            dd($data['santri']);
        }

        return view('hafalan/index', $data);
    }

    //store

    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
    {
        $this->hafalanModel->save($this->request->getVar());
        session()->setFlashdata('message', 'Hafalan berhasil ditambahkan.');
        return redirect()->back();
    }

    //delete
    public function drop($id): RedirectResponse
    {
        $this->hafalanModel->delete($id);
        session()->setFlashdata('message', 'Hafalan berhasil dihapus.');
        return redirect()->back();
    }

    public function filter(){
        $data = [
            'title' => 'Hafalan',
            'hafalan' => $this->hafalanModel->getHafalan($this->request->getGet()),
            'santri' => $this->santriModel->findAll(),
            'pengajar' => $this->pengajarModel->where('user_id', user_id())->first(),
        ];
        if(in_groups('Wali')){
            $wali  = $this->waliModel->where('user_id',  user_id())->first();
            $data['santri'] = $this->santriModel->where('wali_nik',  $wali['nik_wali'])->findAll();
        }

        return view('hafalan/index', $data);
    }

}
