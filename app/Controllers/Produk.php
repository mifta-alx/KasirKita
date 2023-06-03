<?php

namespace App\Controllers;

use App\Models\KategoriProdukModel;
use App\Models\ProdukModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Validation\Rules;

class Produk extends BaseController
{
    use ResponseTrait;
	public function __construct()
	{
		helper('form');
		$this->Produk = new ProdukModel();
	}
	public function index()
	{
		$model = new ProdukModel();
		// var_dump($test);
		// die();
		$nama_bisnis = session()->get('nama_bisnis');
		$outlet_id = session()->get('outlet_id');
		// var_dump($outlet_id);
		// die();
		$data = [
			'title' => 'Produk',
			'base' => 'Table',
			'isi' => 'produk/tabel_produk',
			'homepage' => 'Produk',
			'currentpage' => 'Data Produk',
			'produk' => $model->datajoin(),
			// 'produk' => $model->paginate(4, 'produk'),
			// 'pager' =>$model->pager,
			'dst_kategori' => $model->Kategori(),
			'kategori' => $model->filterkategori($nama_bisnis, $outlet_id),
			'userkategori' => $model->userkategori($nama_bisnis),
			'db' => \Config\Database::connect(),
		];
		echo view('layout/v_wrapper', $data);
	}
	public function data()
	{
		$users = new ProdukModel();
		$nama_bisnis = session()->get('nama_bisnis');
		$kategori = isset($_POST['id_kategori']) ? $_POST['id_kategori'] : [];
		$data = $users->getData($kategori, $nama_bisnis);
		$this->request->setHeader('Accept', 'application/json');
		return $this->respondCreated(['data' => $data]);
	}
	public function datastaff()
	{
		$users = new ProdukModel();
		$nama_bisnis = session()->get('nama_bisnis');
		$outlet_id = session()->get('outlet_id');
		$kategori = isset($_POST['id_kategori']) ? $_POST['id_kategori'] : [];
		$data = $users->staffgetData($kategori, $nama_bisnis, $outlet_id);
		$this->request->setHeader('Accept', 'application/json');
		return $this->respondCreated(['data' => $data]);
	}
	
	public function create()
	{
		$nama_bisnis = session()->get('nama_bisnis');
		$outlet_id = session()->get('outlet_id');
		$data = [
			'title' => 'Produk',
			'base' => 'Form',
			'homepage' => 'Produk',
			'isi' => 'produk/tambah_produk',
			'currentpage' => 'Tambah Data Produk',
			'kategori' => $this->Produk->getkategori($nama_bisnis, $outlet_id),
			'userkategori' => $this->Produk->userkategori($nama_bisnis),
			'db' => \Config\Database::connect(),
			'dataoutlet' => $this->Produk->outlet(),
			'validation' => \Config\Services::validation()
		];

		return view('layout/v_wrapper', $data);
	}
	// halaman  tambah kategori

	public function tambah_produk()
	{
		// validasi input
		if (!$this->validate([
			'nama_produk' => [
				'rules' => 'required|is_unique[db_produk.nama_produk]',
				'errors' => [
					'required' => 'Nama Produk Tidak Boleh Kosong',
					'is_unique' => 'Nama Produk Sudah Terdaftar'
				]
			],
			'harga_jual' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Harga Jual Tidak Boleh Kosong',
				]
			],
			'diskon' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Diskon Tidak Boleh Kosong',
				]
			],
			'total' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Total Tidak Boleh Kosong',
				]
			],
			'diskon_persen' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Presentase Diskon Tidak Boleh Kosong',
				]
			],
			'id_kategori' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Kategori Tidak Boleh Kosong',
				]
			],
			'gambar' => [
				'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' => [
					// 'uploaded' => 'Pilih Gambar terlebih dahulu',
					// 'max_size' => 'Ukuran Gambar Terlalu Besar',
					'is_image' => 'Yang anda Pilih Bukan Gambar',
					'mime_in' => 'Yang anda Pilih Bukan Gambar',
				]
			],
			'outlet_id' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Outlet Harus Dipilih',
				]
			],
		])) {
			return redirect()->to(base_url('produk/create'))->withInput();
		}

		// ambil gambar
		$filegambar = $this->request->getFile('gambar');

		if ($filegambar->getError() == 4) {
			$namagambar = 'produk.png';
		} else {
			$namagambar = $filegambar->getName();
			$filegambar->move('public/template/assets/img/produk/', $namagambar);
		}
		// ambil nama file
		$nominal = preg_replace('/[^0-9]/', '', $this->request->getVar('harga_jual'));
		$produk = new ProdukModel();
		$produk->insert([
			"nama_produk" => $this->request->getVar('nama_produk'),
			// "harga_jual" => $nominal,
			"harga_jual" => $this->request->getVar('harga_jual'),
			"diskon" => $this->request->getVar('diskon'),
			"diskon_persen" => $this->request->getVar('diskon_persen'),
			"total" => $this->request->getVar('total'),
			"id_kategori" => $this->request->getVar('id_kategori'),
			"gambar" => $namagambar,
			"nama_bisnis" => $this->request->getVar('nama_bisnis'),
			"outlet_id" => $this->request->getVar('outlet_id'),
		]);
		if ($produk->getAllData()) {
			session()->setFlashdata('success', true);
			session()->setFlashdata('msg', 'Data Berhasil Ditambah');
		} else {
			session()->setFlashdata('success', false);
			session()->setFlashdata('gagal', 'Data Gagal Ditambah');
		}

		return redirect()->to(base_url('produk/index'));
		// return redirect()->to(site_url('pengguna/edit/' . $id))->withInput();
	}



	public function edit($id)
	{
		$model2 = new KategoriProdukModel();
		$model = new ProdukModel();
		$data = [
			'title' => 'Produk',
			'base' => 'Form',
			'isi' => 'produk/edit_produk',
			'currentpage' => 'Edit Data Produk',
			'homepage' => 'Produk',
			'produk' => $model->find($id),
			'kategori' => $model2->getAllData2(),
			'db' => \Config\Database::connect(),
			'dataoutlet' => $this->Produk->outlet(),
			'validation' => \Config\Services::validation()
		];
		echo view('layout/v_wrapper', $data);
	}
	public function ubahdata($id)
	{
		$dataLama = $this->Produk->find($id);
		if ($dataLama['nama_produk'] != $this->request->getVar('nama_produk')) {
			$rule_nama_produk = 'required|is_unique[db_produk.nama_produk]';
		} else {
			$rule_nama_produk = 'required';
		}
		if (!$this->validate([
			'nama_produk' => [
				'rules' => $rule_nama_produk,
				'errors' => [
					'required' => 'Nama Produk Tidak Boleh Kosong',
					'is_unique' => 'Nama Produk Sudah Terdaftar'
				]
			],
			'harga_jual' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Harga Jual Tidak Boleh Kosong',
				]
			],
			'id_kategori' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Kategori Tidak Boleh Kosong',
				]
			],
			'gambar' => [
				'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' => [
					// 'uploaded' => 'Pilih Gambar terlebih dahulu',
					// 'max_size' => 'Ukuran Gambar Terlalu Besar',
					'is_image' => 'Yang anda Pilih Bukan Gambar',
					'mime_in' => 'Yang anda Pilih Bukan Gambar',
				]
			],
			'outlet_id' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Outlet Harus Dipilih',
				]
			],
		])) {

			return redirect()->to(base_url('produk/edit/' . $id))->withInput();
		}
		// ambil pdf
		$file = $this->request->getFile('gambar');
		$jpglama = $this->request->getVar('JPGLama');
		//  cek gambar ,apakah tetap gambar lama
		if ($file->getError() == 4) {
			$namajpg = $this->request->getVar('JPGLama');
		} else {
			//generate nama random
			$namajpg = $file->getName();
			// pindahkan ke folder pdf
			$file->move('public/template/assets/img/produk/', $namajpg);
			//hapus file
			// var_dump($jpglama == 'produk.png');
			// die();
			if ($jpglama !== 'produk.png') {
				unlink('public/template/assets/img/produk/' . $this->request->getVar('JPGLama'));
			}
			// ambil nama file
		}

		$model = new ProdukModel();
		$nominal = preg_replace('/[^0-9]/', '', $this->request->getVar('harga_jual'));
		$data = [
			"nama_produk" => $this->request->getVar('nama_produk'),
			// "harga_jual" => $nominal,
			"harga_jual" => $this->request->getVar('harga_jual'),
			"diskon" => $this->request->getVar('diskon'),
			"total" => $this->request->getVar('total'),
			"diskon_persen" => $this->request->getVar('diskon_persen'),
			"id_kategori" => $this->request->getVar('id_kategori'),
			"outlet_id" => $this->request->getVar('outlet_id'),
			"gambar" => $namajpg,
		];
		if ($model->ubahdata($id, $data)) {
			session()->setFlashdata('success', true);
			session()->setFlashdata('msg', 'Data Berhasil Diubah');
		} else {
			session()->setFlashdata('success', false);
			session()->setFlashdata('gagal', 'Data Gagal Diubah');
		}
		return redirect()->to(base_url('produk/index'));
	}
	public function hapus($id)
	{
		$model = new ProdukModel();
		$jpg = $model->find($id);
		// cek jika  gambarnya default.png
		if ($jpg['gambar'] != 'produk.png') {
			//hapus gambar
			unlink('public/template/assets/img/produk/' . $jpg['gambar']);
		}

		if ($model->hapusdata($id)) {
			session()->setFlashdata('success', true);
			session()->setFlashdata('msg', 'Data Berhasil Dihapus');
		} else {
			session()->setFlashdata('success', false);
			session()->setFlashdata('gagal', 'Data Gagal Dihapus');
		}
	}
}
