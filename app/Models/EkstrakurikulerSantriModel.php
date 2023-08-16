<?php

namespace App\Models;

use CodeIgniter\Model;

class EkstrakurikulerSantriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ekstrakurikuler_santri';
    protected $primaryKey       = 'id_ekskul_santri';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal_latihan', 'ekskul_id', 'santri_nis', 'created_by', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    //updatedField
    protected $updatedField  = 'updated_at';

    public function getEkskul($idEkskul = null)
    {
        if ($idEkskul == null) {
            return $this->db->table('ekstrakurikuler_santri')
                ->join('ekstrakurikuler', 'ekstrakurikuler.id_ekskul = ekstrakurikuler_santri.ekskul_id')
                ->join('santri', 'santri.nis_santri = ekstrakurikuler_santri.santri_nis')
                ->join('kelas', 'kelas.id_kelas = santri.kelas_id')
                ->join('users', 'users.id = ekstrakurikuler_santri.created_by')
                ->get()->getResultArray();
        }

        return $this->db->table('ekstrakurikuler_santri')
            ->join('ekstrakurikuler', 'ekstrakurikuler.id_ekskul = ekstrakurikuler_santri.ekskul_id')
            ->join('santri', 'santri.nis_santri = ekstrakurikuler_santri.santri_nis')
            ->join('kelas', 'kelas.id_kelas = santri.kelas_id')
            ->join('users', 'users.id = ekstrakurikuler_santri.created_by')
            ->where('ekskul_id', $idEkskul)
            ->get()->getResultArray();
    }

    //get ekskul by nis santri, lebih dari 1 nis
    public function getEkskulByNis($santri)
    {
        $query = [];
        foreach ($santri as $item){
            $query += $this->db->table('ekstrakurikuler_santri')
                ->join('ekstrakurikuler', 'ekstrakurikuler.id_ekskul = ekstrakurikuler_santri.ekskul_id')
                ->join('santri', 'santri.nis_santri = ekstrakurikuler_santri.santri_nis')
                ->join('kelas', 'kelas.id_kelas = santri.kelas_id')
                ->join('users', 'users.id = ekstrakurikuler_santri.created_by')
                ->where('santri_nis', $item['nis_santri'])
                ->get()->getResultArray();
        }

        return $query;
    }

}
