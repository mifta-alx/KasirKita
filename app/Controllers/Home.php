<?php

namespace App\Controllers;
use App\Models\HomeModel;
use App\Models\KotaModel;
use CodeIgniter\API\ResponseTrait;
class Home extends BaseController
{
	use ResponseTrait;
	public function __construct()
	{
		helper('form');
		$this->Home = new HomeModel();
		
	}
	public function index()
	{
		$model = new HomeModel();
		// $tahun_buat = $model->select('YEAR(date_created) AS date_created, COUNT(id_pengguna) AS jumlah')
		// 					->groupBy('YEAR(date_created')
		// 					->get();
		// var_dump($tahun_buat2);
		// die();
		$data = [
			'title' => 'Dashboard',
			'base'=> 'Table',
			'isi' => 'dashboard',
			'currentpage' => 'Analisis Aplikasi',
			'homepage' => 'Dashboard',
            'db' => \Config\Database::connect(),
			'role' => $model->getdatarole(),
			'tahun' => $model->getTahun(),
			'tahun_buat'=>$model->getdatajumlah(),
			'tahun_buat2'=>$model->getdatajumlahsuperuser(),
			'hitunguser' => $model->hitunguser(),
			'hitunguseractive' => $model->hitunguseractive(),
			'hitungsuperuser' => $model->hitungsuperuser(),
			'hitungrole' => $model->hitungrole(),
			//user
			'kasir' => $model->hitungkasir(),
			'staff' => $model->hitungkaryawan(),
			'produk' => $model->hitungproduk(),
			'kategoriproduk' => $model->hitungkategoriproduk(),
		];
		echo view('layout/v_wrapper', $data);
	}
	public function user()
	{
		$model = new HomeModel();
		$kasir = $model->getdatakasir();
		var_dump($kasir);
		die();
		$tahun_buat = $model->getdatajumlah();
		$tahun_buat2 = $model->getdatajumlahsuperuser();
		$data = [
			'title' => 'Dashboard',
			'base'=> 'Table',
			'isi' => 'dashboard',
			'currentpage' => 'Analisis Aplikasi',
			'homepage' => 'Dashboard',
            'db' => \Config\Database::connect(),
			// 'kasir' => $model->getdatakasir(),
			'karyawan' => $model->getdatakaryawan(),
			'tahun' => $model->getTahun(),
			'tahun_buat'=>$tahun_buat,
			'tahun_buat2'=>$tahun_buat2,
			'hitunguser' => $model->hitunguser(),
			'hitunguseractive' => $model->hitunguseractive(),
			'hitungsuperuser' => $model->hitungsuperuser(),
			'hitungrole' => $model->hitungrole()
		];
		echo view('layout/v_wrapper', $data);
	}
	public function data()
	{
		$users = new HomeModel();
		// $data = null;
		$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : [];
		$user = isset($_POST['role_id']) ? $_POST['role_id'] : [];
		$data = $users->getData($tahun, $user);
		// var_dump($data);
		// die();	
		$this->request->setHeader('Accept', 'application/json');
		return $this->respondCreated(['data' => $data]);
	}
	public function getDataUser($tahun = '2021')
	{
	  $users = new HomeModel();
	  $data = $users->getCountUser($tahun);
	  return $this->respondCreated($data);
	}
	public function getDataPengguna($tahun = '2021')
	{
	  $users = new HomeModel();
	  $data = $users->getCountPengguna($tahun);
	  return $this->respondCreated($data);
	}
	public function datakota($id)
    {
        $model = new KotaModel();
        $data = [
            $model->getdata($id),
        ];

        $this->request->setHeader('Accept', 'application/json');
        return $this->respondCreated(['data' => $data]);
    }
}
