<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisbantuanModel extends Model
{
    protected $table      = 'jenisbantuan';
    protected $primaryKey = 'id_jenisbantuan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenisbantuan'];
    
    
}