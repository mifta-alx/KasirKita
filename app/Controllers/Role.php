<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\MenuModel;

class Role extends BaseController
{
    public function __construct()
    {
        helper('kasir');
        helper('form');
        $this->Role = new RoleModel();
    }
    public function index()
    {
        $model = new RoleModel();
        $data = [
            'title' => 'Role',
            'base'=> 'Table',
            'isi' => 'role/tabel_role',
            'homepage' => 'Role',
            'currentpage' => 'Data Role',
            'db' => \Config\Database::connect(),
            'users' => $model->getUsers(),
        ];
        echo view('layout/v_wrapper', $data);
    }

    public function tambah()
    {
        $model = new RoleModel();
        $data = [
            'title' => 'Role',
            'base'=> 'Form',
            'isi' => 'role/tambah_role',
            'currentpage' => 'Tambah Data Role',
            'homepage' => 'Role',
            'db' => \Config\Database::connect(),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function edit($id)
    {
        $model = new RoleModel();
        $data = [
            'title' => 'Role',
            'base'=> 'Form',
            'isi' => 'role/edit_role',
            'currentpage' => 'Edit Data Role',
            'homepage' => 'Role',
            'role' => $model->find($id),
            'db' => \Config\Database::connect(),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambahdata()
    {
        if (!$this->validate([
            'role' => [
                'rules' => 'required|is_unique[user_role.role]',
                'errors' => [
                    'required' => 'Role Tidak Boleh Kosong',
                    'is_unique' => 'Role Sudah Terdaftar',
                ]
            ],
        ])) {
            return redirect()->to('tambah')->withInput();
        }
        $model = new RoleModel();
        $data = array(
            'role'    => $this->request->getVar('role'),
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
        $dataLama = $this->Role->find($id);
        // if ($dataLama['id_pengguna'] != $this->request->getVar('id_pengguna')) {
        //     $rule_id_pengguna = 'required|is_unique[db_login.id_pengguna]|numeric|max_length[11]';
        // } else {
        //     $rule_id_pengguna = 'required|numeric|max_length[11]';
        // }
        if ($dataLama['role'] != $this->request->getVar('role')) {
            $role = 'required|is_unique[user_role.role]';
        } else {
            $role = 'required';
        }
        if (!$this->validate([
            'role' => [
                'rules' => $role,
                'errors' => [
                    'required' => 'Role Tidak Boleh Kosong',
                    'is_unique' => 'Role Sudah Terdaftar',
                ]
            ],


        ])) {
            return redirect()->to(site_url('role/edit/' . $id))->withInput();
        }
        $model = new RoleModel();
        $data = array(
            'role'    => $this->request->getVar('role'),
        );
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('role/index'));
    }
    public function hapus($id)
    {
        $model = new RoleModel();
        if ($model->hapusdata($id)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Dihapus');
        }
    }
    public function access($id)
    {
        $model = new RoleModel();
        $modelmenu = new MenuModel();
        $data = [
            'title' => 'Role',
            'base'=> 'Form',
            'isi' => 'role/access_role',
            'currentpage' => 'Role Access',
            'homepage' => 'Role',
            'role' => $model->find($id),
            'menu' => $modelmenu->getUsers(),
            'db' => \Config\Database::connect(),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function changeaccess()
    {
        $model = new RoleModel();
        $role_id = $this->request->getVar('role_id');
        $menu_id = $this->request->getVar('menu_id');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id,
        ];
        // $result = $model->access($data);
        $result = $model->access($role_id, $menu_id);
        if ($result->get()->getRowArray() < 1) {
            $model->addaccess($data);
        } else {
            $model->deleteaccess($data);
        }
        session()->setFlashdata('success', true);
        session()->setFlashdata('msg', 'Akses Berhasil Dirubah');
    }
}
