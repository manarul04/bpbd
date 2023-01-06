<?php

namespace App\Models;

use CodeIgniter\Model;

class BantuanModel extends Model
{
    protected $table      = 'bantuan';
    protected $primaryKey = 'id_bantuan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['bantuan','jenis_bantuan','tanggal','id_kejadian'];
    
    
}