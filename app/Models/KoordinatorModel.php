<?php

namespace App\Models;

use CodeIgniter\Model;

class KoordinatorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'koordinator';
    protected $primaryKey       = 'nip_koordinator';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'nama_lengkap', 'jk', 'no_hp', 'jabatan', 'is_ketua', 'created_at', 'updated_at'];

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

    //get data koordinator join dengan tabel user
    public function getKoordinator()
    {
        return $this->db->table('koordinator')
            ->join('user', 'user.id = koordinator.user_id')
            ->get()->getResultArray();
    }

    //get data koordinator join dengan tabel user by nip
    public function getKoordinatorByNip($nip)
    {
        return $this->db->table('koordinator')
            ->join('users', 'users.id = koordinator.user_id')
            ->where('nip_koordinator', $nip)
            ->get()->getRowArray();
    }

    //ubah ketua
    public function ubahKetua($nip)
    {
        $this->db->table('koordinator')
            ->set('is_ketua', 0)
            ->update();
        $this->db->table('koordinator')
            ->set('is_ketua', 1)
            ->where('nip_koordinator', $nip)
            ->update();
    }
}
