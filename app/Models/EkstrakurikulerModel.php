<?php

namespace App\Models;

use CodeIgniter\Model;

class EkstrakurikulerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ekstrakurikuler';
    protected $primaryKey       = 'id_ekskul';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['koordinator_nip', 'ekskul', 'hari', 'pukul'];

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

    public function getEkskul($nip = null)
    {
        if ($nip == null)
            return $this->db->table('ekstrakurikuler')
                ->join('koordinator', 'koordinator.nip_koordinator = ekstrakurikuler.koordinator_nip')
                ->get()->getResultArray();
        else
            //hanya 1 data
            return $this->db->table('ekstrakurikuler')
                ->where('koordinator_nip', $nip)
                ->get()->getRowArray();
    }
}
