<?php

namespace App\Controllers;

use App\Models\StokMasukModel;
use CodeIgniter\Validation\Rules;

class Stok_Masuk extends BaseController
{
	public function __construct()
	{
		
		helper('form');
		$this->Stok_Masuk = new StokMasukModel();
	}

    public function index()
	{
		$model = new StokMasukModel();
		$data = [
			'title' => 'Inventori',
			'base'=> 'Table',
			'isi' => 'stok/stok_masuk',
			'homepage' => 'Stok Masuk',
			'currentpage' => 'Data Stok Masuk',
			'users' => $model->getUsers(),
			'stok' => $model->getStok(),
            'db' => \Config\Database::connect(),

		];
		echo view('layout/v_wrapper', $data);
	}

    // function create($produk){
	// 	$result = array();
	// 		foreach($produk AS $key){
	// 			$result[] = array(
	// 			'id_produk'   => $_POST['id_produk'][$key],
	// 			'tgl_submit'   => date('Y-m-d H:i:s'),
	// 			'tgl_pembelian' => $_POST['tgl_pembelian'][$key],
	// 			'jumlah' => $_POST['jumlah'][$key],
	// 			'harga' => $_POST['harga'][$key]
	// 			);
	// 		}      
	// 		$this->db->insert_batch('db_stok_masuk', $result);
	// 	return redirect()->to(base_url('Stok_Masuk'));
	// }
	// function create(){
	// 	$product = $this->input->post('stok_masuk',TRUE);
	// 	$this->StokMasukModel->create_package($product);
	// 	redirect('stok_masuk');
	// }

	// function create(){
	// 	$stok = new StokMasukmodel;
	// 	$data = [];
	// 	$tmp_data = [
	// 		'id_produk'   => $_POST['id_produk'],
	// 		'tgl_submit'   => date('Y-m-d H:i:s'),
	// 		'tgl_pembelian' => $_POST['tgl_pembelian'],
	// 		'jumlah' => $_POST['jumlah'],
	// 		'harga' => $_POST['harga']
	// 	];
	// 	foreach($tmp_data as $k => $v){
	// 		$data = array($tmp_data);
	// 	}
	// 	dd($data);
	// 	$this->db->insert_batch('db_stok_masuk', $data);
	// 	return redirect()->to(base_url('Stok_Masuk'));
	// }
	public function create(){
		$stok_masuk = new StokMasukModel;
		$db      = \Config\Database::connect();
		$builder = $db->table('db_stok_masuk');
		$builder2 = $db->table('db_detail_stok_masuk');
		$query = $db->query("SELECT * FROM db_stok_masuk ORDER BY id_stok_masuk DESC LIMIT 1");
		$package_id = $query->getRow('id_stok_masuk');
		// dd($package_id);
		$data = array();
		foreach($_POST['id_produk'] as $kunci => $val){
			$data[] = array(
				'detail_stok_masuk_id' => $package_id,
				'detail_produk_id' => $_POST['id_produk'][$kunci],
				'tgl_submit'   => date('Y-m-d H:i:s'),
				'tgl_pembelian' => $_POST['tgl_pembelian'][$kunci],
				'jumlah' => $_POST['jumlah'][$kunci],
				'harga' => $_POST['harga'][$kunci]  
			);
		}
		$builder2->insertBatch($data);
		$result = array(
			'kode_stok_masuk' => date('siHdmY'),
            'base'=> 'Form',
		);
		// $result = array();
		// foreach ($_POST['id_produk'] as $key => $val) {
		//    $result[] = array(             
		// 	   	'id_produk' => $_POST['id_produk'][$key]
		//    );      
		// }      
		$builder->insert($result);
		// $stok_masuk->insert_batch('db_stok_masuk', $result);
		return redirect()->to(base_url('Stok_Masuk'));
		// $this->package_model->create_package($package,$product);

	 }

	public function process()
    {
       
	}
	
}