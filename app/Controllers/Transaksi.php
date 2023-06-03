<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use CodeIgniter\Validation\Rules;

class Transaksi extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->Transaksi = new TransaksiModel();
	}
	public function index()
	{
		$nama_bisnis = session()->get('nama_bisnis');
		$outlet = session()->get('outlet_id');
		// var_dump($this->Transaksi->getdatawhere($nama_bisnis, $outlet));
		// die();
		$model = new TransaksiModel();
		$data = [
			'title' => 'Transaksi',
			'base'=> 'Table',
			'isi' => 'transaksi/transaksi',
			'homepage' => 'Transaksi',
			'currentpage' => 'Data Transaksi',
			'join' => $model->datajoin(),
			'produkuser' => $model->where('nama_bisnis', $nama_bisnis)->paginate(12, 'produk2'),
			'produk' => $model->where('nama_bisnis', $nama_bisnis)->where('outlet_id', $outlet)->paginate(12, 'produk'),
			'pager' =>$model->pager,
			'total' =>$model->getdatawhere($nama_bisnis, $outlet),
			'db' => \Config\Database::connect(),
		];
		echo view('layout/v_wrapper', $data);
	}

}
