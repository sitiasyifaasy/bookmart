<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderdetailsModels extends Model
{
    protected $table = 'order_details';
    protected $useTimestamps = false;
    protected $allowedFields = ['qty', 'subtotal', 'invoice', 'id_order', 'id_buku'];
    protected $primaryKey = 'id_orderdetails';
}