<?php namespace App\Models;
use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table = 'db_stok';
    protected $primaryKey = 'id_stok';
    protected $allowedFields = [
        'id_stok',
        'id_produk',
        'stok_awal',
        'stok_masuk',
        'jumlah',
        'stok_keluar',
        'penjualan',
        'transfer',
        'harga_beli',
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
        return $this->db->table('db_produk')->join('db_stok', 'db_stok.id_produk=db_produk.id_produk')->get()->getResultArray();
    
    }
}
// <?php namespace App\Models;
// use CodeIgniter\Model;

// class StokModel extends Model
// {
//     protected $table = 'db_stok';
//     protected $primaryKey = 'id_stok';
//     protected $allowedFields = [
//         'id_stok',
//         'id_produk',
//         'stok_awal',
//         'stok_masuk',
//         'jumlah',
//         'stok_keluar',
//         'penjualan',
//         'transfer',
//         'harga_beli',
//     ];
//     public function getUsers()
//     {
//         // return $this->findAll();
//         // $query = $this->db->table('db_produk')
//         // ->join('db_stok'.'id_produk', '=', 'db_produk'.'id_produk')
//         // ->select('db_produk.id_produk as id_produk', 'db_produk.nama_produk as nama_produk', 'db_produk.kategori as kategori', 'db_stok.stok_awal as stok_awal', 'db_stok.stok_masuk as stok_masuk', 'db_stok.stok_keluar as stok_keluar', 'db_stok.prnjualan as penjualan', 'db_stok.transfer as transfer', 'db_stok.penyesuaian as penyesuaian', 'db_stok.stok_akhir as stok_akhir')
//         // ->get();
//         // $query = "SELECT *
//         // FROM `db_produk` JOIN `db_stok`
//         // ON `db_stok`.`id_produk` = `db_produk`.`id_produk`";
//         // return $query;
//         return $this->db->table('db_produk')
//         // ->join('db_stok', 'db_stok.id_produk=db_produk.id_produk')
//         ->join('db_detail_stok_masuk', 'db_detail_stok_masuk.detail_produk_id=db_produk.id_produk')
//         ->join('db_detail_stok_keluar', 'db_detail_stok_keluar.detail_produk_id=db_produk.id_produk')
//         ->groupBy('id_produk')
//         ->get()
//         ->getResultArray();
    
//     }

//     public function getMasuk()
//     {
//         return $this->db->table('db_detail_stok_masuk')
//         ->count('jumlah')
//         ->where('detail_stok_masuk_id= 1')
//         ->get()
//         ->getResultArray();
//     }
// }