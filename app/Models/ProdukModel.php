<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'db_produk';

    protected $primaryKey = 'id_produk';
    protected $allowedFields = [
        'id_produk',
        'nama_produk',
        'harga_jual',
        'id_kategori',
        'nama_bisnis',
        'outlet_id',
        'gambar',
        'diskon',
        'diskon_persen',
        'total',

    ];
    public function getAllData()
    {
        return $this->db->table('db_produk')->get()->getResultArray();
    }
    public function getkategori($nama_bisnis, $outlet_id)
    {
        return $this->db->table('db_kategori')->where('nama_bisnis', $nama_bisnis)->where('outlet_id', $outlet_id)->get()->getResultArray();
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
    public function getData($kategori = [], $nama_bisnis)
    {
        if ($kategori) {
            $this->builder()->whereIn('db_produk.id_kategori', $kategori);
        }
        return $this->join('db_kategori', 'db_produk.id_kategori=db_kategori.id_kategori')
        ->where('db_produk.nama_bisnis', $nama_bisnis)->get()->getResultArray();
    }
    public function staffgetData($kategori = [], $nama_bisnis, $outlet_id)
    {
        if ($kategori) {
            $this->builder()->whereIn('db_produk.id_kategori', $kategori);
        }
        return $this
        ->join('db_kategori', 'db_produk.id_kategori=db_kategori.id_kategori')
        ->where('db_produk.nama_bisnis', $nama_bisnis)->where('db_produk.outlet_id', $outlet_id)->get()->getResultArray();
    }
    public function filterkategori($nama_bisnis, $outlet_id)
    {
        return $this->db->table('db_kategori')
        ->where('nama_bisnis', $nama_bisnis)
        ->where('outlet_id' ,$outlet_id)
        ->get()->getResultArray();
    }
    public function userkategori($nama_bisnis)
    {
        return $this->db->table('db_kategori')
        ->where('nama_bisnis', $nama_bisnis)
        ->get()->getResultArray();
    }
    public function Kategori()
    {
        // return $this->builder()->distinct()->select('kategori')->get()->getResultArray();
        
        $query = $this->db->table('db_produk')
        ->join('db_kategori', 'db_produk.id_kategori=db_kategori.id_kategori')
        ->distinct()->select('db_kategori.kategori')
        ->get()->getResultArray();
        return $query;
    }
    public function outlet()
    {
        return $this->db->table('db_outlet')->get()->getResultArray();
    }
}
