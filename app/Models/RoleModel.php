<?php namespace App\Models;
use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'user_role';
    protected $primaryKey = 'role_id';
    protected $allowedFields = [
        'role_id',
        'role',
    ];
    public function getUsers()
    {
        return $this->findAll();

    }
    public function tambahdata($data)
    {
        return $this->db->table('user_role')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('user_role')->update($data, array('role_id' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('user_role')->delete(array('role_id' => $id));
        return $query;
    }
    public function access($role_id, $menu_id)
    {
        return $this->db->table('user_access_menu')->where(['menu_id' => $menu_id, 'role_id' => $role_id]);
    }
    public function addaccess($data)
    {
        return $this->db->table('user_access_menu')->insert($data);
    }
    public function deleteaccess($data)
    {
        return $this->db->table('user_access_menu')->delete($data);
    }
}
