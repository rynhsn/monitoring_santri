<?php

namespace App\Models;

use CodeIgniter\Model;

class LembagaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'lembaga';
    protected $primaryKey       = 'id_lembaga';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['visi', 'misi', 'sejarah'];

}
