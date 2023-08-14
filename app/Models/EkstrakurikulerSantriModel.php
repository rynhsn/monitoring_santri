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
    protected $allowedFields    = ['tanggal_latihan', 'ekskul_id', 'santri_nis'];
}
