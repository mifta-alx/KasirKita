<?php

namespace App\Controllers;

use App\Models\KotaModel;
use App\Models\OutletModel;

class Outlet extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->outlet = new OutletModel();
    }
    public function index()
    {
        $nama_bisnis = session()->get('nama_bisnis');
        $model = new OutletModel();
        $data = [
            'title' => 'Outlet',
            'base' => 'Table',
            'isi' => 'outlet/tabel_outlet',
            'homepage' => 'Outlet',
            'currentpage' => 'Data Outlet',
            'db' => \Config\Database::connect(),
            'outlet' => $model->tampildata($nama_bisnis),
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambah()
    {
        $model = new KotaModel();
        $data = [
            'title' => 'Outlet',
            'base' => 'Form',
            'isi' => 'outlet/tambah_outlet',
            'currentpage' => 'Tambah Data Outlet',
            'homepage' => 'Outlet',
            'kota' => $model->getUsers(),
            'db' => \Config\Database::connect(),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function edit($id)
    {
        $model = new OutletModel();
        $model2 = new KotaModel();
        $data = [
            'title' => 'Outlet',
            'base' => 'Form',
            'isi' => 'outlet/edit_outlet',
            'currentpage' => 'Edit Data Outlet',
            'homepage' => 'Outlet',
            'db' => \Config\Database::connect(),
            'outlet' => $model->find($id),
            'kota' => $model2->getUsers(),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambahdata()
    {
        if (!$this->validate([
            'nama_outlet' => [
                'rules' => 'required|is_unique[db_outlet.nama_outlet]|trim',
                'errors' => [
                    'required' => 'Nama Outlet Tidak Boleh Kosong',
                    'is_unique' => 'Nama Outlet Sudah Terdaftar',
                ]
            ],
            'alamat' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Alamat Outlet Tidak Boleh Kosong',
                ]
            ],
            'telpon' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'No. Telpon Outlet Tidak Boleh Kosong',
                ]
            ],
            'kota_kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota Atau Kabupaten Outlet Tidak Boleh Kosong',
                ]
            ],
            // 'pajak' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pajak Outlet Tidak Boleh Kosong',
            //     ]
            // ],
        ])) {
            return redirect()->to('tambah')->withInput();
        }
        $model = new OutletModel();
        $nama_bisnis = session()->get('nama_bisnis');

        $data = array(
            'nama_outlet'   => $this->request->getVar('nama_outlet'),
            'nama_bisnis'   => $nama_bisnis,
            'alamat'        => $this->request->getVar('alamat'),
            'kota_id'       => $this->request->getVar('kota_kabupaten'),
            'kota'          => $this->request->getVar('kota'),
            'provinsi'      => $this->request->getVar('provinsi'),
            'telpon'        => '0'.$this->request->getVar('telpon'),
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
        $dataLama = $this->outlet->find($id);
        if ($dataLama['nama_outlet'] != $this->request->getVar('nama_outlet')) {
            $outlet = 'required|is_unique[db_outlet.nama_outlet]|trim';
        } else {
            $outlet = 'required|trim';
        }
        if (!$this->validate([
            'nama_outlet' => [
                'rules' => $outlet,
                'errors' => [
                    'required' => 'outlet Tidak Boleh Kosong',
                    'is_unique' => 'outlet Sudah Terdaftar',
                ]
            ],
            'alamat' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Alamat Outlet Tidak Boleh Kosong',
                ]
            ],
            'telpon' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'No. Telpon Outlet Tidak Boleh Kosong',
                ]
            ],
            'kota_kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota Atau Kabupaten Outlet Tidak Boleh Kosong',
                ]
            ],
        ])) {
            return redirect()->to(site_url('outlet/edit/' . $id))->withInput();
        }
        $model = new OutletModel();
        $data = array(
            'nama_outlet'   => $this->request->getVar('nama_outlet'),
            'alamat'        => $this->request->getVar('alamat'),
            'kota_id'       => $this->request->getVar('kota_kabupaten'),
            'kota'          => $this->request->getVar('kota'),
            'provinsi'      => $this->request->getVar('provinsi'),
            'telpon'        => '0'.$this->request->getVar('telpon'),
        );
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('outlet/index'));
    }
    public function hapus($id)
    {
        $model = new OutletModel(); 
        if ($model->hapusdata($id)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Dihapus');
        }
    }
}
