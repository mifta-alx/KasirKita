<?php namespace App\Models;
use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'db_login';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = [
        'id_pengguna',
        'nama_pengguna',
        'email',
        'username',
        'password',
        'level',
    ];
    public function getUsers()
    {
        // return $this->findAll();
        return $this->db->table('db_login')->like('role_id', '2')->get()->getResultArray();

    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('db_login')->update($data, array('id_pengguna' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('db_login')->delete(array('id_pengguna' => $id));
        return $query;
    }
    public function role_id()
    {
        return $this->db->table('user_role')->distinct()->select('role')->get()->getResultArray();
    }
    public function getdatarole()
    {
         $query = $this->db->table('db_login')
        ->join('user_role', 'user_role.role_id=db_login.role_id')
        ->get()->getResultArray();
        return $query;
    }
}
