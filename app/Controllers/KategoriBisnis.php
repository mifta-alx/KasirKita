<?php

namespace App\Controllers;

use App\Models\KategoriBisnisModel;

class kategoribisnis extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->kategori = new KategoriBisnisModel();
    }
    public function index()
    {
        $model = new KategoriBisnisModel();
        $data = [
            'title' => 'Kategori',
            'base'=> 'Table',
            'isi' => 'kategoribisnis/tabel_kategori',
            'homepage' => 'Kategori Bisnis',
            'currentpage' => 'Data Kategori',
            'db' => \Config\Database::connect(),
            'kategori' => $model->getUsers(),
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Kategori',
            'base'=> 'Form',
            'isi' => 'kategoribisnis/tambah_kategori',
            'currentpage' => 'Tambah Data Kategori',
            'homepage' => 'Kategori Bisnis',
            'db' => \Config\Database::connect(),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function edit($id)
    {
        $model = new KategoriBisnisModel();
        $data = [
            'title' => 'Kategori',
            'base'=> 'Form',
            'isi' => 'kategoribisnis/edit_kategori',
            'currentpage' => 'Edit Data kategori',
            'homepage' => 'Kategori Bisnis',
            'db' => \Config\Database::connect(),
            'kategori' => $model->find($id),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambahdata()
    {
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required|is_unique[db_access_kategori.kategori]|trim',
                'errors' => [
                    'required' => 'Kategori Tidak Boleh Kosong',
                    'is_unique' => 'Kategori Sudah Terdaftar',
                ]
            ],
        ])) {
            return redirect()->to('tambah')->withInput();
        }
        $model = new KategoriBisnisModel();
        $data = array(
            'kategori'    => $this->request->getVar('kategori'),
            'icon'    => $this->request->getVar('icon'),
        );
        
        if ($model->tambahdata($data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Ditambah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Ditambahkan');
        }
        return redirect()->to('index');
    }
    public function ubahdata($id)
    {
        $dataLama = $this->kategori->find($id);
        if ($dataLama['kategori'] != $this->request->getVar('kategori')) {
            $kategori = 'required|is_unique[db_access_kategori.kategori]|trim';
        } else {
            $kategori = 'required|trim';
        }
        if (!$this->validate([
            'kategori' => [
                'rules' => $kategori,
                'errors' => [
                    'required' => 'Kategori Tidak Boleh Kosong',
                    'is_unique' => 'Kategori Sudah Terdaftar',
                ]
            ],
        ])) {
            return redirect()->to(site_url('kategoribisnis/edit/' . $id))->withInput();
        }
        $model = new KategoriBisnisModel();
        $data = array(
            'kategori'    => $this->request->getVar('kategori'),
            'icon'    => $this->request->getVar('icon'),
        );
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('kategoribisnis/index'));
    }
    public function hapus($id)
    {
        $model = new KategoriBisnisModel();
        if ($model->hapusdata($id)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Dihapus');
        }
    }
}
