<?php namespace App\Models;
use CodeIgniter\Model;

class StokMasukModel extends Model
{
    protected $table = 'db_stok_masuk';
    protected $primaryKey = 'id_stok_masuk';
    protected $allowedFields = [
        'id_stok_masuk',
        'kode_stok_masuk',
        'id_produk',
        'tgl_submit',
        'tgl_pembelian',
        'jumlah',
        'harga',
    ];
    public function getUsers()
    {
        // return $this->findAll();
        // $query = $this->db->table('db_produk')
        // ->join('db_stok'.'id_produk', '=', 'db_produk'.'id_produk')
        // ->select('db_produk.id_produk as id_produk', 'db_produk.nama_produk as nama_produk', 'db_produk.kategori as kategori', 'db_stok.stok_awal as stok_awal', 'db_stok.stok_masuk as stok_masuk', 'db_stok.stok_keluar as stok_keluar', 'db_stok.prnjualan as penjualan', 'db_stok.transfer as transfer', 'db_stok.penyesuaian as penyesuaian', 'db_stok.stok_akhir as stok_akhir')
        // ->get();
        // $query = "SELECT *
        // FROM `db_produk` JOIN `db_stok`
        // ON `db_stok`.`id_produk` = `db_produk`.`id_produk`";
        // return $query;
        return $this->db->table('db_stok_masuk')
        ->join('db_detail_stok_masuk', 'db_detail_stok_masuk.detail_stok_masuk_id=db_stok_masuk.id_stok_masuk')
        ->join('db_produk', 'db_produk.id_produk=db_detail_stok_masuk.detail_produk_id')
        ->groupBy('kode_stok_masuk')
        ->get()
        ->getResultArray();
    
    }

    public function tambah($result){
        return $this->db->insert_batch('db_stok_masuk', $result);
    }

    public function getStok()
    {
        return $this->db->table('db_produk')->get()->getResultArray();
    }
}