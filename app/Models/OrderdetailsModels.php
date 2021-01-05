<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderdetailsModels extends Model
{
    protected $table = 'order_details';
    protected $useTimestamps = false;
    protected $allowedFields = ['qty', 'subtotal', 'invoice', 'id_order', 'id_buku'];
    protected $primaryKey = 'id_orderdetails';

    public function getAllOrderDetail($id)
    {
        return $this->db->table('order_details')->select('*')
            ->where('order_details.id_order', $id)
            ->join('buku', 'order_details.id_buku = buku.id_buku', 'LEFT')
            ->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'LEFT')
            ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'LEFT')->get()->getResultArray();
    }
}
