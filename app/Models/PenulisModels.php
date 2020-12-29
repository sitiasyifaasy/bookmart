<?php

namespace App\Models;

use CodeIgniter\Model;

class PenulisModels extends Model
{
    protected $table = 'penulis';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_penulis', 'email'];
    protected $primaryKey = 'id_penulis';
}
