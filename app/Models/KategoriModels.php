<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModels extends Model
{
    protected $table = 'kategori';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_kategori', 'deskripsi'];
    protected $primaryKey = 'id_kategori';
}
