<?php

namespace App\Models;

use CodeIgniter\Model;

class KejadianModel extends Model
{
    protected $table      = 'kejadian';
    protected $primaryKey = 'id_kejadian';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kejadian','id_kategori','tanggal','sebab','akibat','korban','upaya','dokumentasi','id_lokasi'];
    
    
}