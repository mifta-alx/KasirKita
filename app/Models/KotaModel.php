<?php namespace App\Models;
use CodeIgniter\Model;

class KotaModel extends Model
{
    protected $table = 'db_kota';
    protected $primaryKey = 'kota_id';
    protected $allowedFields = [
        'kota_id',
        'kota_kabupaten',
        'provinsi',
    ];
    public function getUsers()
    {
        return $this->findAll();
    }
    public function getdata($id)
    {
        return $this->db->table('db_kota')->where('kota_id' , $id)->get()->getResultArray();
    }
}
