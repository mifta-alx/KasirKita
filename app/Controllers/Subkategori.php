<?php

namespace App\Controllers;

use App\Models\KategoriBisnisModel;
use App\Models\SubkategoriModel;

class Subkategori extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Subkategori = new SubKategoriModel();
    }
    public function index()
    {
        $model = new SubkategoriModel();
        $model2 = new KategoriBisnisModel();
        $data = [
            'title' => 'Kategori',
            'base'=> 'Table',
            'isi' => 'subkategori/tabel_subkategori',
            'homepage' => 'SubKategori',
            'currentpage' => 'Data SubKategori',
            'db' => \Config\Database::connect(),
            'subkategori' => $model->getUsers(),
            'kategori' => $model->getdatakategori(),
            
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambah()
    {
        $model2 = new KategoriBisnisModel();
        $data = [
            'title' => 'Kategori',
            'base'=> 'Form',
            'isi' => 'subkategori/tambah_subkategori',
            'currentpage' => 'Tambah Data SubKategori',
            'homepage' => 'SubKategori',
            'kategori' => $model2->getUsers(),
            'db' => \Config\Database::connect(),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function edit($id)
    {
        $model = new SubkategoriModel();
        $model2 = new KategoriBisnisModel();
        $data = [
            'title' => 'Kategori',
            'base'=> 'Form',
            'isi' => 'subkategori/edit_subkategori',
            'currentpage' => 'Edit Data Subkategori',
            'homepage' => 'Subkategori',
            'db' => \Config\Database::connect(),
            'subkategori' => $model->find($id),
            'editkategori' => $model2->getUsers(),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambahdata()
    {
        if (!$this->validate([
            'id_kategori' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Kategori Tidak Boleh Kosong',
                ]
            ],
            'subkategori' => [
                'rules' => 'required|is_unique[db_access_subkategori.subkategori]|trim',
                'errors' => [
                    'required' => 'SubKategori Tidak Boleh Kosong',
                    'is_unique' => 'SubKategori Sudah Terdaftar',
                ]
            ],
        ])) {
            return redirect()->to('tambah')->withInput();
        }
        $model = new SubkategoriModel();
        $data = array(
            'id_kategori'    => $this->request->getVar('id_kategori'),
            'subkategori'    => $this->request->getVar('subkategori'),
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
        // $dataLama = $this->subkategori->find($id);
        // if ($dataLama['subkategori'] != $this->request->getVar('subkategori')) {
        //     $subkategori = 'required|is_unique[db_access_subkategori.subkategori]|trim';
        // } else {
        //     $subkategori = 'required|trim';
        // }
        if (!$this->validate([
            'id_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SubKategori Tidak Boleh Kosong',
                ]
            ],
            'subkategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SubKategori Tidak Boleh Kosong',
                ]
            ],
        ])) {
            return redirect()->to(site_url('subkategori/edit/' . $id))->withInput();
        }
        $model = new SubkategoriModel();
        $data = array(
            'id_kategori'    => $this->request->getVar('id_kategori'),
            'subkategori'    => $this->request->getVar('subkategori'),
        );
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('Subkategori/index'));
    }
    public function hapus($id)
    {
        $model = new SubkategoriModel();
        if ($model->hapusdata($id)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Dihapus');
        }
    }
}
