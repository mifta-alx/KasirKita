<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\SubMenuModel;

class SubMenu extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->SubMenu = new SubMenuModel();
    }
    public function index()
    {
        $model = new SubMenuModel();
        $data = [
            'title' => 'Management',
            'base'=> 'Table',
            'isi' => 'submenu/submenu_tabel',
            'homepage' => 'Sub Menu Management',
            'currentpage' => 'Data Sub Menu',
            'db' => \Config\Database::connect(),
            'submenu' => $model->getUsers(),
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambah()
    {
        $model = new SubMenuModel();
        $data = [
            'title' => 'Management',
            'base'=> 'Form',
            'isi' => 'submenu/tambah_submenu',
            'currentpage' => 'Tambah Data Sub Menu',
            'homepage' => 'Sub Menu Management',
            'db' => \Config\Database::connect(),
            'validation' => \Config\Services::validation(),
            'menu' => $model->getmenuitem(),
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function edit($id)
    {
        $model = new SubMenuModel();
        $data = [
            'title' => 'Management',
            'base'=> 'Form',
            'isi' => 'submenu/edit_submenu',
            'currentpage' => 'Edit Data Sub Menu',
            'homepage' => 'Sub Menu Management',
            'db' => \Config\Database::connect(),
            'validation' => \Config\Services::validation(),
            'submenu' => $model->find($id),
            'menu' => $model->getmenuitem(),
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambahdata()
    {
        if (!$this->validate([
            'menu_id' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Menu Tidak Boleh Kosong',
                ]
            ],
            'sub_title' => [
                'rules' => 'required|is_unique[user_sub_menu.sub_title]|trim',
                'errors' => [
                    'required' => 'Title Tidak Boleh Kosong',
                    'is_unique' => 'Title Sudah Terdaftar',
                ]
            ],
            'sub_url' => [
                'rules' => 'required|is_unique[user_sub_menu.sub_url]|trim',
                'errors' => [
                    'required' => 'URL Tidak Boleh Kosong',
                    'is_unique' => 'URL Sudah Terdaftar',
                ]
            ],
            'sub_icon' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Icon Tidak Boleh Kosong',
                ]
            ],
        ])) {
            return redirect()->to('tambah')->withInput();
        }
        $model = new SubMenuModel();
        $data = array(
            'menu_id'    => $this->request->getVar('menu_id'),
            'sub_title'    => $this->request->getVar('sub_title'),
            'sub_url'    => $this->request->getVar('sub_url'),
            'sub_icon'    => $this->request->getVar('sub_icon'),
            'sub_is_active'    => $this->request->getVar('sub_is_active') ?? 0,
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
        $dataLama = $this->SubMenu->find($id);
        if ($dataLama['sub_title'] != $this->request->getVar('sub_title')) {
            $title = 'required|is_unique[user_sub_menu.sub_title]|trim';
        } else {
            $title = 'required|trim';
        }
        if ($dataLama['sub_url'] != $this->request->getVar('sub_url')) {
            $url = 'required|is_unique[user_sub_menu.sub_url]';
        } else {
            $url = 'required|trim';
        }
        if (!$this->validate([
            
            'menu_id' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Menu Tidak Boleh Kosong',
                ]
            ],
            'sub_title' => [
                'rules' => $title,
                'errors' => [
                    'required' => 'Title Tidak Boleh Kosong',
                    'is_unique' => 'Title Sudah Terdaftar',
                ]
            ],
            'sub_url' => [
                'rules' => $url,
                'errors' => [
                    'required' => 'URL Tidak Boleh Kosong',
                    'is_unique' => 'URL Sudah Terdaftar',
                ]
            ],
            'sub_icon' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Icon Tidak Boleh Kosong',
                ]
            ],
        ])) {
            return redirect()->to(site_url('submenu/edit/' . $id))->withInput();
        }
        $model = new SubMenuModel();
        $data = array(
            'menu_id'    => $this->request->getVar('menu_id'),
            'sub_title'    => $this->request->getVar('sub_title'),
            'sub_url'    => $this->request->getVar('sub_url'),
            'sub_icon'    => $this->request->getVar('sub_icon'),
            'sub_is_active'    => $this->request->getVar('sub_is_active'),
        );
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('submenu/index'));
    }
    public function hapus($id)
    {
        $model = new SubMenuModel();
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
