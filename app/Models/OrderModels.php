<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModels extends Model
{
    protected $table = 'order';
    protected $useTimestamps = false;
    protected $allowedFields = ['tgl_order', 'status_order', 'invoice', 'metode_pengiriman', 'total', 'nama', 'alamat', 'id_user'];
    protected $primaryKey = 'id_order';
}