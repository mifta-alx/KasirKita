<?php

namespace App\Controllers;

use App\Models\KategoriProdukModel;
use CodeIgniter\Validation\Rules;

// use App\Models\RoleModel;

class kategoriproduk extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->Kategori = new KategoriProdukModel();
	}
	public function index()
	{
		$model = new KategoriProdukModel();
		$data = [
			'title' => 'Kategori',
			'base'=> 'Table',
			'isi' => 'kategoriproduk/kategori_pengguna',
			'homepage' => 'Kategori',
            'db' => \Config\Database::connect(),
			'currentpage' => 'Data Kategori',
			'kategori' => $model->getAllData(),
		];
		echo view('layout/v_wrapper', $data);
	}


	public function create()
	{
		$model = new KategoriProdukModel();
		$data = [
			'title' => 'Produk',
            'base'=> 'Form',
			'homepage' => 'Produk',
			'isi' => 'kategoriproduk/tambah_kategori',
			'currentpage' => 'Tambah Data Kategori',
			'kategori' => $model->getAllData2(),
			'db' => \Config\Database::connect(),
			'dataoutlet' => $this->Kategori->outlet(),
			'validation' => \Config\Services::validation()
		];

		return view('layout/v_wrapper', $data);
	}

	public function tambah_kategori()
	{

		// validasi input
		if (!$this->validate([
			'kategori' => [
				'rules' => 'required|is_unique[db_kategori.kategori]',
				'errors' => [
					'required' => 'Kategori Tidak Boleh Kosong',
					'is_unique' => 'Kategori Sudah Terdaftar',
				]
			],
			'outlet_id' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Outlet Harus Dipilih',
				]
			],
		])) {
			return redirect()->to(base_url('kategoriproduk/create'))->withInput();
		}

		$model = new KategoriProdukModel();
		$data = array(
			"kategori" => $this->request->getVar('kategori'),
			"nama_bisnis" => $this->request->getVar('nama_bisnis'),
			"outlet_id" => $this->request->getVar('outlet_id'),
		);
		if ($model->tambahdata($data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Ditambah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Ditambahkan');
        }

		return redirect()->to(base_url('produk/index'));
	}
	
	public function edit($id)
	{
		$model = new KategoriProdukModel();
		$data = [
			'title' => 'Produk',
            'base'=> 'Form',
			'isi' => 'kategoriproduk/edit_kategori',
			'currentpage' => 'Edit Data Kategori',
			'homepage' => 'Produk',
			'kategori' => $model->find($id),
            'db' => \Config\Database::connect(),
			'dataoutlet' => $this->Kategori->outlet(),
			'validation' => \Config\Services::validation(),
			// 'role_id' => $model->role_id(),
		];
		echo view('layout/v_wrapper', $data);
	}
	public function ubahdata($id)
	{
		$dataLama = $this->Kategori->find($id);
		if ($dataLama['kategori'] != $this->request->getVar('kategori')) {
			$rule_kategori = 'required|is_unique[db_kategori.kategori]';
		}else{
			$rule_kategori = 'required';
		}
		if (!$this->validate([
			'kategori' => [
                'rules' => $rule_kategori,
                'errors' =>[
                    'required' => 'Kategori Tidak Boleh Kosong',
					'is_unique' => 'Kategori Sudah Terdaftar',
                ]
                ],
				'outlet_id' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Outlet Harus Dipilih',
					]
				],
		])) {
			return redirect()->to(base_url('kategoriproduk/edit/' . $id))->withInput();
		}

		$model = new KategoriProdukModel();
		$data = [
			"kategori" => $this->request->getVar('kategori'),
			"outlet_id" => $this->request->getVar('outlet_id'),
		];
		if ($model->ubahdata($id, $data)) {
			session()->setFlashdata('success', true);
			session()->setFlashdata('msg', 'Data Kategori Berhasil Diubah');
		} else {
			session()->setFlashdata('success', false);
			session()->setFlashdata('gagal', 'Data Kategori Gagal Diubah');
		}
		// $produk->update($id, $produk);
		return redirect()->to(base_url('Produk/index'));
		// return redirect()->to(site_url('produk/edit/' . $id))->withInput();
	}
	public function hapus($id)
	{
		$model = new KategoriProdukModel();
		if ($model->hapusdata($id)) {
			session()->setFlashdata('success', true);
			session()->setFlashdata('msg', 'Data Berhasil Dihapus');
		} else {
			session()->setFlashdata('success', false);
			session()->setFlashdata('gagal', 'Data Gagal Dihapus');
		}
	}
}
