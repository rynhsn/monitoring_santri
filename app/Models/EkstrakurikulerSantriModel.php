<?php

namespace App\Models;

use CodeIgniter\Model;

class EkstrakurikulerSantriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ekstrakurikuler_santri';
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['ekskul_id', 'santri_nis'];
}
