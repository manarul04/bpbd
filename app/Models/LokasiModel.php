<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table      = 'lokasi';
    protected $primaryKey = 'id_lokasi';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['lokasi','rt','rw','desa','kecamatan','kota'];
    
    
}