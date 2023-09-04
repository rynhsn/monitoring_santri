<?php

namespace App\Models;

use CodeIgniter\Model;

class HafalanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'hafalan';
    protected $primaryKey       = 'id_hafalan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['santri_nis', 'pengajar_nip', 'surah', 'ayat_awal', 'ayat_akhir', 'tanggal', 'link_kegiatan', 'keterangan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getHafalan($data = null): array
    {
        if ($data == null) {
            return $this->db->table('hafalan')
                ->select('santri.nama_lengkap as nama_santri, santri.kelas_id, pengajar.nama_lengkap as nama_pengajar, hafalan.*, kelas.kelas')
                ->join('santri', 'santri.nis_santri = hafalan.santri_nis')
                ->join('kelas', 'kelas.id_kelas = santri.kelas_id')
                ->join('pengajar', 'pengajar.nip_pengajar = hafalan.pengajar_nip')
                ->get()->getResultArray();
        }

        return $this->db->table('hafalan')
            ->select('santri.nama_lengkap as nama_santri, santri.kelas_id, pengajar.nama_lengkap as nama_pengajar, hafalan.*, kelas.kelas')
            ->join('santri', 'santri.nis_santri = hafalan.santri_nis')
            ->join('kelas', 'kelas.id_kelas = santri.kelas_id')
            ->join('pengajar', 'pengajar.nip_pengajar = hafalan.pengajar_nip')
            ->where($data)
            ->get()->getResultArray();
    }
}
