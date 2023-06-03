<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'db_produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = [
        'id_produk',
        'nama_produk',
        'nama_bisnis',
        'outlet_id',
        'harga_jual',
        'id_kategori',
        'gambar',
        'diskon',
        'diskon_persen',
        'total',

    ];
    public function getdatawhere($nama_bisnis, $outlet)
    {
        return $this->db->table('db_produk')
        ->where('nama_bisnis', $nama_bisnis)
        ->where('outlet_id', $outlet)
        ->countAllResults();
    }
    public function datajoin()
    {
        $query = $this->db->table('db_produk')
        ->join('db_kategori', 'db_produk.id_kategori=db_kategori.id_kategori')
        ->get()->getResultArray();
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('db_produk')->delete(array('id_produk' => $id));
        return $query;
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('db_produk')->update($data, array('id_produk' => $id));
        return $query;
    }
}
