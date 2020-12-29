<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerbitModels extends Model
{
    protected $table = 'penerbit';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_penerbit', 'alamat_penerbit', 'email', 'telp_penerbit'];
    protected $primaryKey = 'id_penerbit';
}
