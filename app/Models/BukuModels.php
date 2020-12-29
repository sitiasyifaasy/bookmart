<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModels extends Model
{
    protected $table = 'buku';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_buku', 'telp_user', 'harga', 'stok', 'halaman', 'tgl_terbit', 'format', 'cover', 'id_penulis', 'id_penerbit', 'id_kategori'];
    protected $primaryKey = 'id_buku';

    public function getAllBuku()
    {
        return $this->db->table('buku')->select('*')
            ->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'LEFT')
            ->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'LEFT')
            ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'LEFT')->get()->getResultArray();
    }
}
