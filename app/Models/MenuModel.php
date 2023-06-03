<?php namespace App\Models;
use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'user_menu';
    protected $primaryKey = 'menu_id';
    protected $allowedFields = [
        'menu_id',
        'menu',
        'url',
        'icon',
    ];
    public function getUsers()
    {
        return $this->findAll();

    }
    public function tambahdata($data)
    {
        return $this->db->table('user_menu')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('user_menu')->update($data, array('menu_id' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('user_menu')->delete(array('menu_id' => $id));
        return $query;
    }
    public function join($id)
    {
        $query = $this->db->table('user_menu')
        ->join('user_access_menu', 'user_access_menu.menu_id=user_menu.menu_id')
        ->where('role_id',$id)
        ->get()->getResultArray();
        return $query;
    }
}
