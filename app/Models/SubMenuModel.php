<?php namespace App\Models;
use CodeIgniter\Model;

class SubMenuModel extends Model
{
    protected $table = 'user_sub_menu';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'menu_id',
        'sub_title',
        'sub_icon',
        'sub_url',
        'sub_is_active',
    ];
    public function getUsers()
    {
        return $this->findAll();
    }
    public function tambahdata($data)
    {
        return $this->db->table('user_sub_menu')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('user_sub_menu')->update($data, array('id' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('user_sub_menu')->delete(array('id' => $id));
        return $query;
    }
    public function getmenuitem()
    {
        return $this->db->table('user_menu')->select('menu_id,title')->get()->getResultArray();
    }
    // public function menujoin()
    // {
    //     $query = $this->db->table('user_sub_menu')
    //     ->select('t2.menu')->from('user_sub_menu as t1',' user_menu as t2')
    //     ->join('user_menu', 'user_menu.menu_id=user_sub_menu.menu_id')
    //     ->where('user_menu.menu_id=user_sub_menu.menu_id')
    //     ->get()->getResultArray();
    //     return $query;
    // }
}
