<?php

namespace App\Controllers;

use App\Models\StokKeluarModel;
use CodeIgniter\Validation\Rules;

class Stok_Keluar extends BaseController
{
	public function __construct()
	{
		
		helper('form');
		$this->Stok_Keluar = new StokKeluarModel();
	}

    public function index()
	{
		$model = new StokKeluarModel();
		$data = [
			'title' => 'Inventori',
			'base'=> 'Table',
			'isi' => 'stok/stok_keluar',
			'homepage' => 'Stok Keluar',
			'currentpage' => 'Data Stok Keluar',
			'users' => $model->getUsers(),
			'stok' => $model->getStok(),
            'db' => \Config\Database::connect(),

		];
		echo view('layout/v_wrapper', $data);
	}

	public function create(){
		$stok_keluar = new StokKeluarModel;
		$db      = \Config\Database::connect();
		$builder = $db->table('db_stok_keluar');
		$builder2 = $db->table('db_detail_stok_keluar');
		$query = $db->query("SELECT * FROM db_stok_keluar ORDER BY id_stok_keluar DESC LIMIT 1");
		$package_id = $query->getRow('id_stok_keluar');
		// dd($package_id);
		$data = array();
		foreach($_POST['id_produk'] as $kunci => $val){
			$data[] = array(
				'detail_stok_keluar_id' => $package_id,
				'detail_produk_id' => $_POST['id_produk'][$kunci],
				'tgl_submit'   => date('Y-m-d H:i:s'),
				'tgl_pengeluaran' => $_POST['tgl_pengeluaran'][$kunci],
				'jumlah' => $_POST['jumlah'][$kunci],
				'harga' => $_POST['harga'][$kunci]  
			);
		}
		$builder2->insertBatch($data);
		$result = array(
			'kode_stok_keluar' => date('siHdmY'),
            'base'=> 'Form',
		);
		// $result = array();
		// foreach ($_POST['id_produk'] as $key => $val) {
		//    $result[] = array(             
		// 	   	'id_produk' => $_POST['id_produk'][$key]
		//    );      
		// }      
		$builder->insert($result);
		// $stok_keluar->insert_batch('db_stok_keluar', $result);
		return redirect()->to(base_url('Stok_Keluar'));
		// $this->package_model->create_package($package,$product);

	 }

	public function process()
    {
       
	}
	
}