<?php namespace App\Models;
use CodeIgniter\Model;

class SubkategoriModel extends Model
{
    protected $table = 'db_access_subkategori';
    protected $primaryKey = 'subkategori_id';
    protected $allowedFields = [
        'subkategori_id',
        'subkategori',
        'url'
    ];
    public function getUsers()
    {
        return $this->findAll();

    }
    public function tambahdata($data)
    {
        return $this->db->table('db_access_subkategori')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('db_access_subkategori')->update($data, array('subkategori_id' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('db_access_subkategori')->delete(array('subkategori_id' => $id));
        return $query;
    }
    public function getdatakategori()
    {
        $query = $this->db->table('db_access_subkategori')
        ->join('db_access_kategori', 'db_access_kategori.kategori_id = db_access_subkategori.id_kategori')
        ->get()->getResultArray(); 
        return $query;
    }
}
 