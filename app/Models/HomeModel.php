<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
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
    public function hitunguser()
    {
        return $this->db->table('db_login')->where('role_id !=', '1')->countAllResults();
    }
    public function hitunguseractive()
    {
        return $this->db->table('db_login')->where('role_id !=', '1')
                        ->where('is_active', '1')
                        ->countAllResults();
    }
    public function hitungsuperuser()
    {
        return $this->db->table('db_login')->where('role_id', '3')->countAllResults();
    }
    public function hitungrole()
    {
        return $this->db->table('user_role')->countAllResults();
    }
    public function getdatarole()
    {
        return $this->db->table('db_login')->select('COUNT(db_login.role_id) AS jumlah, user_role.role AS role')
                        ->where('role !=', 'admin')
						->join('user_role', 'db_login.role_id=user_role.role_id')
						->groupBy('db_login.role_id')
						->get()->getResultArray();
    }
    public function getdatajumlah()
    {
        return $this->db->table('db_login')->select('tahun AS tahun, bulan AS bulan, COUNT(id_pengguna) AS jumlah')
        ->join('user_role', 'db_login.role_id=user_role.role_id')
                        ->like('role', 'user')
						->groupBy('bulan')
						->get()->getResultArray();
    }
    public function getdatajumlahsuperuser()
    {
        return $this->db->table('db_login')->select('year(tgl) AS tahun, month(tgl) AS bulan, COUNT(id_pengguna) AS jumlah')
                        // ->join('user_role', 'db_login.role_id=user_role.role_id')
                        ->Where('role_id', '3')
						->groupBy('month(tgl)')
						->get()->getResultArray();
    }

    public function getData($tahun = ['2020'],  $user = [])
    {
        if ($tahun) {
            $this->builder()->whereIn('tahun', $tahun);
        }
        if ($user) {
            $this->builder()->whereIn('role_id', $user);
        }
        return $this->findAll();
    }
    public function getTahun()
    {
        return $this->builder()->select('tahun')->distinct('tahun')->where('tahun !=', '-')->orderBy('tahun', 'desc')->get()->getResultArray();
    }
    public function getCountPengguna($tahun)
    {
        $this->builder()->select('COUNT(db_login.role_id) AS jumlah, user_role.role AS role')->where('tahun', $tahun)
        ->where('role !=', 'admin')
        ->join('user_role', 'db_login.role_id=user_role.role_id')
        ->groupBy('db_login.role_id');
        $query = $this->builder()->get()->getResultArray();
        return $query;
    }
    public function getCountUser($tahun)
    {
        $this->builder()->select('bulan, COUNT(id_pengguna) as total')->where('tahun', $tahun)
        ->where('role_id !=', '1')->where('role_id !=', '');
        $this->builder()->groupBy('bulan');
        // ->orderBy('bulan', 'asc')
        // ->orderBy('total', 'desc');
        $query = $this->builder()->get()->getResultArray();
        return $query;
    }
    function array_in_string($str, array $arr)
    {
        foreach ($arr as $arr_value) { //start looping the array
            if (stripos($str, $arr_value) !== false) return true; //if $arr_value is found in $str return true
        }
        return false; //else return false
    }

    //USER

    public function hitungkasir()
    {
        return $this->db->table('db_login')->where('role_id', '4')->countAllResults();
    }
    public function hitungkaryawan()
    {
        return $this->db->table('db_login')->where('role_id', '5')->countAllResults();
    }
    public function hitungproduk()
    {
        return $this->db->table('db_produk')->countAllResults();
    }
    public function hitungkategoriproduk()
    {
        return $this->db->table('db_kategori')->countAllResults();
    }
}