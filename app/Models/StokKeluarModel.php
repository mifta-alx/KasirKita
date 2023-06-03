<?php namespace App\Models;
use CodeIgniter\Model;

class StokKeluarModel extends Model
{
    protected $table = 'db_stok_keluar';
    protected $primaryKey = 'id_stok_keluar';
    protected $allowedFields = [
        'id_stok_keluar',
        'kode_stok_keluar',
    ];
    public function getUsers()
    {
        // return $this->findAll();
        // $query = $this->db->table('db_produk')
        // ->join('db_stok'.'id_produk', '=', 'db_produk'.'id_produk')
        // ->select('db_produk.id_produk as id_produk', 'db_produk.nama_produk as nama_produk', 'db_produk.kategori as kategori', 'db_stok.stok_awal as stok_awal', 'db_stok.stok_keluar as stok_keluar', 'db_stok.stok_keluar as stok_keluar', 'db_stok.prnjualan as penjualan', 'db_stok.transfer as transfer', 'db_stok.penyesuaian as penyesuaian', 'db_stok.stok_akhir as stok_akhir')
        // ->get();
        // $query = "SELECT *
        // FROM `db_produk` JOIN `db_stok`
        // ON `db_stok`.`id_produk` = `db_produk`.`id_produk`";
        // return $query;
        return $this->db->table('db_stok_keluar')
        ->join('db_detail_stok_keluar', 'db_detail_stok_keluar.detail_stok_keluar_id=db_stok_keluar.id_stok_keluar')
        ->join('db_produk', 'db_produk.id_produk=db_detail_stok_keluar.detail_produk_id')
        ->groupBy('kode_stok_keluar')
        ->get()
        ->getResultArray();
    
    }

    public function tambah($result){
        return $this->db->insert_batch('db_stok_keluar', $result);
    }

    public function getStok()
    {
        return $this->db->table('db_produk')->get()->getResultArray();
    }
}