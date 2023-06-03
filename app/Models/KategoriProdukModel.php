<?php namespace App\Models;
use CodeIgniter\Model;

class KategoriProdukModel extends Model
{
    protected $table = 'db_kategori';
    
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = [
        'id_kategori',
        'kategori',
        'outlet_id',
        'nama_bisnis'
    ];
    public function getAllData2()
    {
        return $this->db->table('db_kategori')->get()->getResultArray();
    }
    public function tambahdata($data)
    {
        return $this->db->table('db_kategori')->insert($data);
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('db_kategori')->delete(array('id_kategori' => $id));
        return $query;
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('db_kategori')->update($data, array('id_kategori' => $id));
        return $query;
    }
    public function outlet()
    {
        return $this->db->table('db_outlet')->get()->getResultArray();
    }
  
   
}
