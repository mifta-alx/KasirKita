<?php

namespace App\Controllers;

use App\Models\StokModel;
use CodeIgniter\Validation\Rules;

class Kartu_Stok extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->Kartu_Stok = new StokModel();
	}

    public function index()
	{
		$model = new StokModel();
		$data = [
			'title' => 'Kartu Stok',
			'base'=> 'Table',
			'isi' => 'stok/kartu_stok',
			'homepage' => 'Kartu Stok',
			'currentpage' => 'Data Kartu Stok',
			'users' => $model->getUsers(),
			'stok' => $model->getMasuk(),
            'db' => \Config\Database::connect(),

		];
		echo view('layout/v_wrapper', $data);
	}
}