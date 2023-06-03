<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Menu extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Menu = new MenuModel();
    }
    public function index()
    {
        $model = new MenuModel();
        $id = session()->get('role_id');
        $data = [
            'title' => 'Management',
            'base'=> 'Table',
            'isi' => 'menu/menu_tabel',
            'homepage' => 'Menu Management',
            'currentpage' => 'Data Menu',
            'db' => \Config\Database::connect(),
            // 'data_join' => $model->join($id),
            'menu' => $model->getUsers(),
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambah()
    {
        $model = new MenuModel();
        $data = [
            'title' => 'Management',
            'base'=> 'Form',
            'isi' => 'menu/tambah_menu',
            'currentpage' => 'Tambah Data Menu',
            'homepage' => 'Menu Management',
            'db' => \Config\Database::connect(),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function edit($id)
    {
        $model = new menuModel();
        $data = [
            'title' => 'Management',
            'base'=> 'Form',
            'isi' => 'menu/edit_menu',
            'currentpage' => 'Edit Data Menu',
            'homepage' => 'Menu Management',
            'db' => \Config\Database::connect(),
            'menu' => $model->find($id),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambahdata()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[user_menu.title]|trim',
                'errors' => [
                    'required' => 'Title Tidak Boleh Kosong',
                    'is_unique' => 'Title Sudah Terdaftar',
                ]
            ],
            'url' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'URL Tidak Boleh Kosong',
                    'is_unique' => 'URL Sudah Terdaftar',
                ]
            ],
            'icon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Icon Tidak Boleh Kosong',
                ]
            ],
        ])) {
            return redirect()->to('tambah')->withInput();
        }
        $model = new MenuModel();
        $data = array(
            'title'    => $this->request->getVar('title'),
            'url'    => $this->request->getVar('url'),
            'icon'    => $this->request->getVar('icon'),
            'is_active'    => $this->request->getVar('is_active') ?? 0,
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
        $dataLama = $this->Menu->find($id);
        if ($dataLama['title'] != $this->request->getVar('title')) {
            $title = 'required|is_unique[user_menu.title]|trim';
        } else {
            $title = 'required|trim';
        }
        if ($dataLama['url'] != $this->request->getVar('url')) {
            $url = 'required|trim';
        } else {
            $url = 'required|trim';
        }
        if (!$this->validate([
            'title' => [
                'rules' => $title,
                'errors' => [
                    'required' => 'Title Tidak Boleh Kosong',
                    'is_unique' => 'Title Sudah Terdaftar',
                ]
            ],
            'url' => [
                'rules' => $url,
                'errors' => [
                    'required' => 'URL Tidak Boleh Kosong',
                    'is_unique' => 'URL Sudah Terdaftar',
                ]
            ],
            'icon' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Icon Tidak Boleh Kosong',
                ]
            ],
        ])) {
            return redirect()->to(site_url('menu/edit/' . $id))->withInput();
        }
        $model = new MenuModel();
        $data = array(
            'title'    => $this->request->getVar('title'),
            'url'    => $this->request->getVar('url'),
            'icon'    => $this->request->getVar('icon'),
            'is_active'    => $this->request->getVar('is_active'),
        );
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('menu/index'));
    }
    public function hapus($id)
    {
        $model = new MenuModel();
        if ($model->hapusdata($id)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Dihapus');
        }
    }
    // public function access($id)
    // {
    //     $model = new RoleModel();
    //     $data = [
    //         'title' => 'Role',
    //         'isi' => 'role/access_role',
    //         'currentpage' => 'Edit Data Role',
    //         'homepage' => 'Role',
    //         'role' => $model->find($id),
    //         'validation' => \Config\Services::validation()
    //     ];
    //     echo view('layout/v_wrapper', $data);
    // }
}
