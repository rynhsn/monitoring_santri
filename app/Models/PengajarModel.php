<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengajar';
    protected $primaryKey       = 'nip_pengajar';
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

    //get data pengajar join dengan tabel user
    public function getPengajar()
    {
        return $this->db->table('pengajar')
            ->join('user', 'user.id = pengajar.user_id')
            ->get()->getResultArray();
    }

    //get data pengajar join dengan tabel user by nip
    public function getPengajarByNip($nip)
    {
        return $this->db->table('pengajar')
            ->join('users', 'users.id = pengajar.user_id')
            ->where('nip_pengajar', $nip)
            ->get()->getRowArray();
    }

    //ubah ketua
    public function ubahKetua($nip)
    {
        $this->db->table('pengajar')
            ->set('is_ketua', 0)
            ->update();
        $this->db->table('pengajar')
            ->set('is_ketua', 1)
            ->where('nip_pengajar', $nip)
            ->update();
    }
}
