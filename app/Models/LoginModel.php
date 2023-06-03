<?php namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'db_login';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = [
        'id_pengguna',
        'nama_pengguna',
        'email',
        'image',
        'password',
        'username',
        'role_id', 
        'is_active', 
        'date_created', 
        'tgl', 
        'bulan', 
        'tahun', 
        'nama_bisnis', 
        'kota_kabupaten', 
        'provinsi', 
        'kategori', 
        'subkategori',
    ];
    public function cek_login($username, $password)
    {
        return $this->db->table('db_login')
        ->where(array('username' => $username,'password' => $password))
        ->get()->getRowArray();
    }
    public function cek_login2($username, $password)
    {
        return $this->db->table('db_karyawan')
        ->where(array('username' => $username,'password' => $password))
        ->get()->getRowArray();
    }
    public function cek_token($email, $token)
    {
        return $this->db->table('user_token')
        ->where(array('email' => $email,'token' => $token))
        ->get()->getRowArray();
    }
    public function cek_user($email)
    {
        return $this->db->table('db_login')
        ->where(array('email' => $email))
        ->get()->getRowArray();
    }
    public function tambahdata($data)
    {
        return $this->db->table('db_login')->insert($data);
    }
    public function ubahdata($data, $email)
    {
        return $this->db->table('db_login')->update($data, array('email'=>$email));
    }
    public function tambahtoken($data)
    {
        return $this->db->table('user_token')->insert($data);
    }
    public function ubahtoken($user_token, $email)
    {
        return $this->db->table('user_token')->update($user_token, array('email'=>$email));
    }
    public function ubahuser($email, $data)
    {
        return $this->db->table('db_login')->where('email', $email)->update($data);
    }
    public function hapususer($id)
    {
        return $this->db->table('db_login')->delete(array('email' => $id));
    }
    public function hapustoken($email)
    {
        return $this->db->table('user_token')->delete(array('email' => $email));
    }
    public function resend_email($email, $data)
    {
       return $this->db->table('user_token')->where('email', $email)->update($data);
    }
    public function getByEmail($email)
    {
        return $this->db->table('db_login')->where('email', $email)->get()->getRowArray();
    }
    public function cekemail($email)
    {
        return $this->db->table('user_token')->where('email', $email)->get()->getRowArray();
    }
}
