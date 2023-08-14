<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EkstrakurikulerModel;
use App\Models\KoordinatorModel;

class DataEkskul extends BaseController
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

//        dd($data['ekskul']);

        return view('data-ekskul/index', $data);
    }

    public function store()
    {
        if($this->request->getVar('id_ekskul') == null){
            $exist = $this->ekskulModel->where('koordinator_nip', $this->request->getVar('koordinator_nip'))->first();

            if($exist){
                session()->setFlashdata('error', 'Koordinator sudah sudah di-assign sebelumnya.');
                return redirect()->back();
            }
        }

        $this->ekskulModel->save($this->request->getVar());
        session()->setFlashdata('message', 'Ekstrakurikuler berhasil disimpan.');
        return redirect()->back();
    }

    //drop data
    public function drop($id)
    {
        $this->ekskulModel->delete($id);
        session()->setFlashdata('message', 'Ekstrakurikuler berhasil dihapus.');
        return redirect()->back();
    }
}
