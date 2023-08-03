<?php

namespace App\Models;

use CodeIgniter\Model;

class WaliModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'wali';
    protected $primaryKey       = 'nik_wali';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'nama_lengkap', 'jk', 'alamat', 'no_hp', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
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

    //get data koordinator join dengan tabel user by nip
    public function getWaliByNik($nik)
    {
        return $this->db->table('wali')
            ->select('wali.*, users.email, users.username, santri.nama_lengkap as nama_santri')
            ->join('users', 'users.id = wali.user_id')
            ->join('santri', 'santri.wali_nik = wali.nik_wali', 'left')
            ->where('nik_wali', $nik)
            ->get()->getRowArray();
    }

    //ambil data wali lalu left join dengan tabel santri
    public function getWali()
    {
        return $this->db->table('wali')
            ->select('wali.*, santri.nama_lengkap as nama_santri')
            ->join('santri', 'santri.wali_nik = wali.nik_wali', 'left')
            ->get()->getResultArray();
    }
}
