<?php

namespace App\Models;

use CodeIgniter\Model;

class KonfirmasiModels extends Model
{
    protected $table = 'konfirmasi_order';
    protected $useTimestamps = false;
    protected $allowedFields = ['atas_nama', 'nominal', 'keterangan', 'bukti_pembayaran', 'id_order'];
    protected $primaryKey = 'id_konfirmasi';
}
