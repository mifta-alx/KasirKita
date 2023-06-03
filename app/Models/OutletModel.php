<?php namespace App\Models;
use CodeIgniter\Model;

class OutletModel extends Model
{
    protected $table = 'db_outlet';
    protected $primaryKey = 'outlet_id';
    protected $allowedFields = [
        'outlet_id',
        'nama_outlet',
        'nama_bisnis',
        'alamat',
        'kota_id',
        'kota',
        'provinsi',
        'telpon', 
        'pajak',
    ];
    public function getUsers()
    {
        return $this->findAll();

    }
    public function tambahdata($data)
    {
        return $this->db->table('db_outlet')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('db_outlet')->update($data, array('outlet_id' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('db_outlet')->delete(array('outlet_id' => $id));
        return $query;
    }
    public function tampildata($nama_bisnis){
        return $this->db->table('db_outlet')->where(array('nama_bisnis' => $nama_bisnis))->get()->getresultarray();
    }
}
