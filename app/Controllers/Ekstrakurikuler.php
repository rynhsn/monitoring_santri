<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EkstrakurikulerModel;
use App\Models\EkstrakurikulerSantriModel;
use App\Models\KoordinatorModel;
use App\Models\SantriModel;
use App\Models\WaliModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class Ekstrakurikuler extends BaseController
{
    protected EkstrakurikulerModel $ekskulModel;
    protected KoordinatorModel $koordinatorModel;
    protected WaliModel $waliModel;
    protected SantriModel $santriModel;
    protected $ekskulSantriModel;

    public function __construct()
    {
        $this->ekskulModel = new EkstrakurikulerModel();
        $this->koordinatorModel = new KoordinatorModel();
        $this->waliModel = new WaliModel();
        $this->santriModel = new SantriModel();
        $this->ekskulSantriModel = new EkstrakurikulerSantriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Ekstrakurikuler',
            'ekskulSantri' => $this->ekskulSantriModel->getEkskul(),
            'santri' => $this->santriModel->findAll(),
            'listEkskul' => $this->ekskulModel->getEkskul(),
        ];
        if (in_groups('Koordinator')) {
            $data['koordinator'] = $this->koordinatorModel->where('user_id', user_id())->first();
            $data['ekskul'] = $this->ekskulModel->getEkskul($data['koordinator']['nip_koordinator']);
            $data['ekskulSantri'] = $this->ekskulSantriModel->getEkskul($data['ekskul']['id_ekskul']);
        }

        if (in_groups('Wali')) {
            $wali = $this->waliModel->where('user_id', user_id())->first();
            $data['santri'] = $this->santriModel->where('wali_nik', $wali['nik_wali'])->findAll();
//            $data['ekskulSantri'] = $this->ekskulSantriModel->getEkskulByNis($data['santri']);
            $data['ekskulSantri'] = $this->ekskulSantriModel->getEkskulByCond(['wali_nik'=>$wali['nik_wali']]);
        }

//        dd($data);
        return view('ekstrakurikuler/index', $data);
    }

    //store

    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
    {
        $this->ekskulSantriModel->save($this->request->getVar());
        session()->setFlashdata('message', 'Data berhasil ditambahkan.');
        return redirect()->back();
    }

    //delete
    public function drop($id): RedirectResponse
    {
        $this->ekskulSantriModel->delete($id);
        session()->setFlashdata('message', 'Data berhasil dihapus.');
        return redirect()->back();
    }
//
//    public function filter(){
//        $data = [
//            'title' => 'Hafalan',
//            'hafalan' => $this->hafalanModel->getHafalan($this->request->getGet()),
//            'santri' => $this->santriModel->findAll(),
//            'pengajar' => $this->pengajarModel->where('user_id', user_id())->first(),
//        ];
//        if(in_groups('Wali')){
//            $wali  = $this->waliModel->where('user_id',  user_id())->first();
//            $data['santri'] = $this->santriModel->where('wali_nik',  $wali['nik_wali'])->findAll();
//        }
//
//        return view('hafalan/index', $data);
//    }
}
