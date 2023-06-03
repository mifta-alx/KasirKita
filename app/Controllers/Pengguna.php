<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use App\Models\RoleModel;

class Pengguna extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->Pengguna = new PenggunaModel();
	}
	public function index()
	{
		$model = new PenggunaModel();
		$data = [
			'title' => 'Pengguna',
			'base'=> 'Table',
			'isi' => 'pengguna/tabel_pengguna',
			'homepage' => 'Pengguna',
            'db' => \Config\Database::connect(),
			'currentpage' => 'Data Pengguna',
			'role' => $model->getdatarole(),
			'users' => $model->getUsers(),
		];
		echo view('layout/v_wrapper', $data);
	}
	
	public function edit($id)
	{
		$model = new PenggunaModel();
		$model2 = new RoleModel();
		$data = [
			'title' => 'Pengguna',
            'base'=> 'Form',
			'isi' => 'pengguna/edit_pengguna',
			'currentpage' => 'Edit Data Pengguna',
			'homepage' => 'Pengguna',
			'pengguna' => $model->find($id),
            'db' => \Config\Database::connect(),
			'validation' => \Config\Services::validation(),
			'role_id' => $model->role_id(),
			'role' => $model2->getUsers()
		];
		echo view('layout/v_wrapper', $data);
	}
	public function ubahdata($id)
	{
		$dataLama = $this->Pengguna->find($id);
		// if ($dataLama['id_pengguna'] != $this->request->getVar('id_pengguna')) {
		//     $rule_id_pengguna = 'required|is_unique[db_login.id_pengguna]|numeric|max_length[11]';
		// } else {
		//     $rule_id_pengguna = 'required|numeric|max_length[11]';
		// }
		if ($dataLama['nama_pengguna'] != $this->request->getVar('nama_pengguna')) {
			$rule_nama_pengguna = 'required|is_unique[db_login.nama_pengguna]';
		} else {
			$rule_nama_pengguna = 'required';
		}
		if ($dataLama['email'] != $this->request->getVar('email')) {
			$rule_email = 'required|is_unique[db_login.email]|valid_email';
		} else {
			$rule_email = 'required|valid_email';
		}
		if (!$this->validate([
			// 'id_pengguna' => [
			//     'rules' => $rule_id_pengguna,
			//     'errors' => [
			//         'required' => 'Id SPP Tidak Boleh Kosong',
			//         'is_unique' => 'Id SPP Sudah Terdaftar',
			//         'numeric' => 'Id SPP Harus Angka',
			//         'max_length' => 'Id SPP Maksimal 11 Angka'
			//     ]
			// ],
			'nama_pengguna' => [
				'rules' => $rule_nama_pengguna,
				'errors' => [
					'required' => 'Nama Tidak Boleh Kosong',
					'is_unique' => 'Nama Sudah Terdaftar',
					'max_length' => 'Nama Maksimal 11 Angka'
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
			'level' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Level Tidak Boleh Kosong',
				]
			],


		])) {
			return redirect()->to(site_url('pengguna/edit/' . $id))->withInput();
		}
		$model = new PenggunaModel();
		$data = [
			'nama_pengguna'   => $this->request->getVar('nama_pengguna'),
			'email'      => $this->request->getVar('email'),
			'password'      => $this->request->getVar('password'),
			'username'      => $this->request->getVar('username'),
			'level'      => $this->request->getVar('level'),
		];
		if ($model->ubahdata($id, $data)) {
			session()->setFlashdata('success', true);
			session()->setFlashdata('msg', 'Data Berhasil Diubah');
		} else {
			session()->setFlashdata('success', false);
			session()->setFlashdata('gagal', 'Data Gagal Diubah');
		}
		return redirect()->to(base_url('pelanggan/index'));
	}
	public function hapus($id)
	{
		$model = new PenggunaModel();
		if ($model->hapusdata($id)) {
			session()->setFlashdata('success', true);
			session()->setFlashdata('msg', 'Data Berhasil Dihapus');
		} else {
			session()->setFlashdata('success', false);
			session()->setFlashdata('gagal', 'Data Gagal Dihapus');
		}
	}
}
