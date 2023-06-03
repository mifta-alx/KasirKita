<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use CodeIgniter\Validation\Rules;

class Karyawan extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->Karyawan = new KaryawanModel();
	}
	public function index()
	{
		$model = new KaryawanModel();
		// var_dump($model->datajoin());
		// die();
		$nama_bisnis = session()->get('nama_bisnis');
		$data = [
			'title' => 'Karyawan',
			'base' => 'Table',
			'isi' => 'karyawan/tabel_karyawan',
			'homepage' => 'Karyawan',
			'currentpage' => 'Data Karyawan',
			'users' => $model->datajoin($nama_bisnis),
			'datajoinoutlet' => $model->datajoinoutlet(),
			'db' => \Config\Database::connect(),
		];
		echo view('layout/v_wrapper', $data);
	}

	public function edit($id)
	{
		$model = new KaryawanModel();
		$nama_bisnis = session()->get('nama_bisnis');
		// var_dump($model->cariwithjoin($id, $nama_bisnis));
		// die();
		$data = [
			'title' => 'Karyawan',
			'base' => 'Form',
			'isi' => 'karyawan/edit_karyawan',
			'currentpage' => 'Edit Data Karyawan',
			'homepage' => 'Karyawan',
			'karyawan' => $model->find($id),
			// 'karyawan' =>$model->cariwithjoin($id, $nama_bisnis),
			'datajoin' => $model->cariwithjoin($id, $nama_bisnis),
			// 'users' => $model->datajoin(),

			'dataoutlet' => $this->Karyawan->outlet(),
			'db' => \Config\Database::connect(),
			'validation' => \Config\Services::validation()
		];
		echo view('layout/v_wrapper', $data);
	}
	public function ubahdata($id)
	{
		$dataLama = $this->Karyawan->find($id);
		if ($dataLama['nama_karyawan'] != $this->request->getVar('nama_karyawan')) {
			$rule_nama_karyawan = 'required|is_unique[db_karyawan.nama_karyawan]';
		} else {
			$rule_nama_karyawan = 'required';
		}
		if ($dataLama['email'] != $this->request->getVar('email')) {
			$rule_email = 'required|is_unique[db_karyawan.email]|valid_email';
		} else {
			$rule_email = 'required|valid_email';
		}
		if ($dataLama['username'] != $this->request->getVar('username')) {
			$rule_username = 'required|is_unique[db_karyawan.username]';
		} else {
			$rule_username = 'required';
		}
		if (!$this->validate([
			'nama_karyawan' => [
				'rules' => $rule_nama_karyawan,
				'errors' => [
					'required' => 'Nama Tidak Boleh Kosong',
					'is_unique' => 'Nama Sudah Terdaftar',
				]
			],
			'username' => [
				'rules' => $rule_username,
				'errors' => [
					'required' => 'Username Tidak Boleh Kosong',
					'is_unique' => 'Username Sudah Terdaftar',
				]
			],
			'email' => [
				'rules' => $rule_email,
				'errors' => [
					'required' => 'Email Tidak Boleh Kosong',
					'is_unique' => 'Email Sudah Terdaftar',
					'valid_email' => 'Format Harus example@email.com',
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Password Tidak Boleh Kosong',
				]
			],
			'role_id' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Role Id Tidak Boleh Kosong'
				]
				],
				'outlet_id' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Outlet Harus Dipilih'
					]
				],
		])) {
			return redirect()->to(site_url('karyawan/edit/' . $id))->withInput();
		}
		$model = new KaryawanModel();
		$data = [
			'nama_karyawan'   => $this->request->getVar('nama_karyawan'),
			'email'      => $this->request->getVar('email'),
			'password'      => $this->request->getVar('password'),
			'username'      => $this->request->getVar('username'),
			'role_id'      => $this->request->getVar('role_id'),
			'outlet_id' => $this->request->getVar('outlet_id'),
		];
		if ($model->ubahdata($id, $data)) {
			session()->setFlashdata('success', true);
			session()->setFlashdata('msg', 'Data Berhasil Diubah');
		} else {
			session()->setFlashdata('success', false);
			session()->setFlashdata('gagal', 'Data Gagal Diubah');
		}
		return redirect()->to(base_url('Karyawan'));
	}
	public function hapus($id)
	{
		$model = new KaryawanModel();
		if ($model->hapusdata($id)) {
			session()->setFlashdata('success', true);
			session()->setFlashdata('msg', 'Data Berhasil Dihapus');
		} else {
			session()->setFlashdata('success', false);
			session()->setFlashdata('gagal', 'Data Gagal Dihapus');
		}
	}

	public function create()
	{
		$data = [
			'title' => 'Karyawan',
			'base' => 'Form',
			'isi' => 'karyawan/tambah_karyawan',
			'currentpage' => 'Tambah Data Karyawan',
			'homepage' => 'Karyawan',
			'db' => \Config\Database::connect(),
			'validation' => \Config\Services::validation(),
			'dataoutlet' => $this->Karyawan->outlet(),
		];
		echo view('layout/v_wrapper', $data);
	}

	public function save()
	{
		if (!$this->validate([
			'nama_karyawan' => [
				'rules' => 'required|is_unique[db_karyawan.nama_karyawan]|trim',
				'errors' => [
					'required' => 'Nama Tidak Boleh Kosong',
					'is_unique' => 'Nama Sudah Terdaftar',
				]
			],
			'username' => [
				'rules' => 'required|is_unique[db_karyawan.username]|trim',
				'errors' => [
					'required' => 'Username Tidak Boleh Kosong',
					'is_unique' => 'Username Sudah Terdaftar',
				]
			],
			'email' => [
				'rules' => 'required|is_unique[db_karyawan.email]|valid_email|trim',
				'errors' => [
					'required' => 'Email Tidak Boleh Kosong',
					'is_unique' => 'Email Sudah Terdaftar',
					'valid_email' => 'Format Harus example@email.com',
				]
			],
			'password' => [
				'rules' => 'required|trim|min_length[5]',
				'errors' => [
					'required' => 'Password Tidak Boleh Kosong',
					'min_length' => 'Password Minimal 5 Karakter',
				]
			],
			'role_id' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Role Id Tidak Boleh Kosong'
				]
			],
			'outlet_id' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Outlet Harus Dipilih'
				]
			],
		])) {
			return redirect()->to(site_url('karyawan/create'))->withInput();
		}
		$model = new KaryawanModel();
		$data = [
			'nama_karyawan' => $this->request->getVar('nama_karyawan'),
			'email' => $this->request->getVar('email'),
			'image' => $this->request->getVar('image'),
			'password' => $this->request->getVar('password'),
			'username' => $this->request->getVar('username'),
			'role_id' => $this->request->getVar('role_id'),
			'is_active' => $this->request->getVar('is_active'),
			'date_created'  => time(),
			'tgl' => $this->request->getVar('tgl'),
			'bulan' => $this->request->getVar('bulan'),
			'tahun' => $this->request->getVar('tahun'),
			'nama_bisnis' => $this->request->getVar('nama_bisnis'),
			'outlet_id' => $this->request->getVar('outlet_id'),
			'kota_kabupaten' => $this->request->getVar('kota_kabupaten'),
			'provinsi' => $this->request->getVar('provinsi'),
			'kategori' => $this->request->getVar('kategori'),
			'subkategori' => $this->request->getVar('subkategori'),
		];
		if ($model->tambahdata($data)) {
			session()->setFlashdata('success', true);
			session()->setFlashdata('msg', 'Data Berhasil Ditambah');
		} else {
			session()->setFlashdata('success', false);
			session()->setFlashdata('gagal', 'Data Gagal Ditambah');
		}
		return redirect()->to(base_url('Karyawan'));
	}
}
