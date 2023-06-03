<?php namespace App\Models;
use CodeIgniter\Model;

class KaryawanModel extends Model
{
    // protected $table = 'db_karyawan';
    // protected $primaryKey = 'id_karyawan';
    // protected $allowedFields = [
    //     'id_karyawan',
    //     'nama_karyawan',
    //     'email',
    //     'password',
    //     'username',
    //     'role_id',
    // ];
    protected $table = 'db_karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $allowedFields = [
        'id_karyawan',
        'nama_karyawan',
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
        'outlet_id',
        'kota_kabupaten',
        'provinsi',
        'kategori',
        'subkategori',
    ];
    public function getUsers()
    {
        return $this->findAll();
        // return $this->db->table('db_karyawan')->like('role_id', '4')->get()->getResultArray();

    }
    public function tambahdata($data)
    {
        return $this->db->table('db_karyawan')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('db_karyawan')->update($data, array('id_karyawan' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('db_karyawan')->delete(array('id_karyawan' => $id));
        return $query;
    }
    public function datajoin($nama_bisnis)
    {
        $query = $this->db->table('db_karyawan')
        ->join('user_role', 'db_karyawan.role_id=user_role.role_id')
        ->join('db_outlet', 'db_karyawan.outlet_id=db_outlet.outlet_id')
        ->where('db_karyawan.role_id', '5')->where('db_karyawan.nama_bisnis' , $nama_bisnis)
        ->orWhere('db_karyawan.role_id', '4')->where('db_karyawan.nama_bisnis' , $nama_bisnis)
        ->get()->getResultArray();
        return $query;
    }
    public function outlet()
    {
        return $this->db->table('db_outlet')->get()->getResultArray();
    }
    public function datajoinoutlet()
    {
        return $this->db->table('db_karyawan')
        ->join('db_outlet', 'db_karyawan.outlet_id=db_outlet.outlet_id')
        ->get()->getResultArray();
    }
    public function cariwithjoin($id ,  $nama_bisnis)
    {
        // $query = $this->db->table('db_karyawan')
        // ->join('user_role', 'db_karyawan.role_id=user_role.role_id')
        // ->where('id_karyawan',$id)
        // ->get()->getResultArray();
        // return $query;
        $query = $this->db->table('db_karyawan')
        ->join('user_role', 'db_karyawan.role_id=user_role.role_id')
        ->where('db_karyawan.role_id', '4' )
        // ->where('nama_bisnis' , $nama_bisnis)
        ->where('id_karyawan',$id)
        ->get()->getResultArray();
        return $query;
    }
}
