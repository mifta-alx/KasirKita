<?php namespace App\Models;
use CodeIgniter\Model;

class KategoriBisnisModel extends Model
{
    protected $table = 'db_access_kategori';
    protected $primaryKey = 'kategori_id';
    protected $allowedFields = [
        'kategori_id',
        'kategori',
        'icon',
    ];
    public function getUsers()
    {
        return $this->findAll();

    }
    public function tambahdata($data)
    {
        return $this->db->table('db_access_kategori')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('db_access_kategori')->update($data, array('kategori_id' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('db_access_kategori')->delete(array('kategori_id' => $id));
        return $query;
    }
}
