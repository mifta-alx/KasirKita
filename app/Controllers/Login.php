<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\KategoriBisnisModel;
use App\Models\SubkategoriModel;
use App\Models\KotaModel;
use App\Models\OutletModel;
use CodeIgniter\API\ResponseTrait;

use function PHPSTORM_META\map;

class Login extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        helper('form');
        helper('text');
        $this->LoginModel = new LoginModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation(),
        ];
        echo view('login', $data);
    }
    public function cek_login()
    {
        if (!$this->validate([
            'Username' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Username Tidak Boleh Kosong',
                    'valid_email' => 'Username Harus Valid',
                ]
            ],
            'Password' => [
                'rules' => 'required|trim|min_length[5]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'min_length' => 'Password Minimal 5 Karakter',
                ]
                ],
            
        ])) {
            return redirect()->to(site_url('login'))->withInput();
        }
        $username = $this->request->getPost('Username');
        $password = $this->request->getPost('Password');
        $cek = $this->LoginModel->cek_login($username, $password);
        $cek2 = $this->LoginModel->cek_login2($username, $password);
        if ($cek || $cek2) {
            if (($cek['is_active'] == 1) || ($cek2['is_active'] == 1)) {
                // if (($cek['username'] == $username) && ($cek['role_id'] == '1' || $cek['role_id'] == '2')) {
                if (($cek['username'] == $username) && ($cek['password'] == $password)) {
                    //jika username dan password benar
                    session()->set('id_pengguna', $cek['id_pengguna']);
                    session()->set('username', $cek['username']);
                    session()->set('nama_pengguna', $cek['nama_pengguna']);
                    session()->set('email', $cek['email']);
                    session()->set('image', $cek['image']);
                    session()->set('role_id', $cek['role_id']);
                    session()->set('nama_bisnis', $cek['nama_bisnis']);
                    session()->set('kota_kabupaten', $cek['kota_kabupaten']);
                    session()->set('provinsi', $cek['provinsi']);
                    session()->set('kategori', $cek['kategori']);
                    session()->set('subkategori', $cek['subkategori']);
                    session()->setFlashdata('success', true);
                    session()->setFlashdata('pesan1', 'Anda Berhasil Login');
                    return redirect()->to(base_url('home'));
                } elseif (($cek2['username'] == $username) && ($cek2['password'] == $password)) {
                    session()->set('id_karyawan', $cek2['id_karyawan']);
                    session()->set('username', $cek2['username']);
                    session()->set('nama_karyawan', $cek['nama_karyawan']);
                    session()->set('email', $cek2['email']);
                    session()->set('image', $cek2['image']);
                    session()->set('outlet_id', $cek2['outlet_id']);
                    session()->set('nama_bisnis', $cek2['nama_bisnis']);
                    session()->set('role_id', $cek2['role_id']);
                    session()->setFlashdata('success', true);
                    session()->setFlashdata('pesan1', 'Anda Berhasil Login');
                    return redirect()->to(base_url('home'));
                }
                // else {
                //     session()->setFlashdata('success', true);
                //     session()->setFlashdata('bahaya', 'Username atau Password salah');
                //     return redirect()->to(base_url('login'));
                // }
            } else {
                session()->setFlashdata('success', true);
                session()->setFlashdata('bahaya1', 'Akun Belum Aktif');
                session()->setFlashdata('txt', 'Silahkan Verifikasi Terlebih Dahulu');
                return redirect()->to(site_url('login'));
            }
            
        } elseif (($cek['password'] !== $password) || ($cek2['password'] !== $password)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('bahaya', 'Password Salah');
            return redirect()->to(site_url('login'));
        } else {
            session()->setFlashdata('success', true);
            session()->setFlashdata('bahaya', 'Akun Belum Terdaftar');
            return redirect()->to(base_url('login'));
        }
    }
    public function logout()
    {
        session()->remove('username');
        session()->remove('id_pengguna');
        session()->remove('nama_pengguna');
        session()->remove('nama_karyawan');
        session()->remove('role_id');
        session()->remove('email');
        session()->remove('nama_bisnis');
        session()->remove('outlet_id');
        session()->remove('kota_kabupaten');
        session()->remove('provinsi');
        session()->remove('kategori');
        session()->remove('subkategori');
        session()->setFlashdata('pesan', 'Anda Berhasil Logout!!!');
        return redirect()->to(base_url('login'));
    }
    //--------------------------------------------------------------------
    public function signup()
    {
        $data = [
            'title' => 'Sign Up',
            'validation' => \Config\Services::validation()
        ];
        echo view('signup', $data);
    }
    public function register()
    {
        if (!$this->validate([
            'nama_pengguna' => [
                'rules' => 'required|trim|is_unique[db_login.nama_pengguna]',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong',
                    'is_unique' => 'Nama Sudah Terdaftar',
                    'max_length' => 'Nama Maksimal 11 Angka'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[db_login.username]|trim',
                'errors' => [
                    'required' => 'Username Tidak Boleh Kosong',
                    'is_unique' => 'Username Sudah Terdaftar',
                    'valid_email' => 'Username Harus Valid',
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[db_login.email]|valid_email|trim',
                'errors' => [
                    'required' => 'Email Tidak Boleh Kosong',
                    'is_unique' => 'Email Sudah Terdaftar',
                    'valid_email' => 'Format Email Harus Valid',
                ]
            ],
            'password1' => [
                'rules' => 'required|trim|min_length[5]|matches[password2]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'matches' => 'Password Tidak Sama!',
                    'min_length' => 'Password Minimal 5 Karakter',
                ]
            ],
            'password2' => [
                'rules' => 'required|trim|min_length[5]|matches[password1]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'matches' => 'Password Tidak Sama!',
                    'min_length' => 'Password Minimal 5 Karakter',
                ]
            ],
            'checkbox' => [
                'rules' => 'required'
            ]
        ])) {
            return redirect()->to('signup')->withInput();
        }
        // ambil jpg
        $filejpg = $this->request->getFile('image');
        //cek apakah tidak ada gambar yg diupload
        if ($filejpg->getError() == 4) {
            $namajpg = 'admin.png';
        } else {
            //generate nama random
            // $namapdf = $filepdf->getRandomName();
            // ambil nama file
            $namajpg = $filejpg->getName();
            // pindahkan ke folder gambar
            $filejpg->move('public/template/assets/img/', $namajpg);
        }
        $model = new LoginModel();
        $data = array(
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'email'         => $this->request->getVar('email'),
            'password'      => $this->request->getVar('password1'),
            'username'      => $this->request->getVar('username'),
            'image'         => $namajpg,
            'role_id'       => '2',
            'is_active'     => '0',
            'date_created'  => time(),
            'tgl' => $this->request->getVar('tgl'),
            'bulan' => $this->request->getVar('bulan'),
            'tahun' => $this->request->getVar('tahun'),
        );
        $token = random_string('numeric', 6);
        $email = $this->request->getVar('email');
        $user_token = [
            'email' => $this->request->getVar('email'),
            'token' => $token,
            'date_created' => time()
        ];
        if ($user_token) {
            session()->set('get_email', $email);
            $this->change();
        }

        $model->tambahdata($data);
        $model->tambahtoken($user_token);

        $this->_sendEmail($token, 'verify');

        session()->setFlashdata('success', true);
        session()->setFlashdata('pesan', 'Kode Verifikasi Telah Dikirim Ke Email Anda');
        return redirect()->to('verifikasi');
    }
    public function re_register()
    {
        $emailLama = $this->request->getVar('email');
        $dataLama = $this->LoginModel->getByEmail($emailLama);
        if ($dataLama['nama_pengguna'] != $this->request->getVar('nama_pengguna')) {
            $rule_nama_pengguna = 'required|trim|is_unique[db_login.nama_pengguna]';
        } else {
            $rule_nama_pengguna = 'required|trim';
        }
        if ($dataLama['username'] != $this->request->getVar('username')) {
            $rule_username = 'required|trim|is_unique[db_login.username]';
        } else {
            $rule_username = 'required|trim';
        }
        if ($dataLama['email'] != $this->request->getVar('email')) {
            $rule_email = 'required|valid_email|trim|is_unique[db_login.email]';
        } else {
            $rule_email = 'required|valid_email|trim';
        }
        if (!$this->validate([
            'nama_pengguna' => [
                'rules' => $rule_nama_pengguna,
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong',
                    'is_unique' => 'Nama Sudah Terdaftar',
                    'max_length' => 'Nama Maksimal 11 Angka'
                ]
            ],
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'Username Tidak Boleh Kosong',
                    'is_unique' => 'Username Sudah Terdaftar',
                    'valid_email' => 'Username Harus Valid',
                ]
            ],
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Email Tidak Boleh Kosong',
                    'is_unique' => 'Email Sudah Terdaftar',
                    'valid_email' => 'Format Email Harus Valid',
                ]
            ],
            'password1' => [
                'rules' => 'required|trim|min_length[5]|matches[password2]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'matches' => 'Password Tidak Sama!',
                    'min_length' => 'Password Minimal 5 Karakter',
                ]
            ],
            'password2' => [
                'rules' => 'required|trim|min_length[5]|matches[password1]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'matches' => 'Password Tidak Sama!',
                    'min_length' => 'Password Minimal 5 Karakter',
                ]
            ],
            'checkbox' => [
                'rules' => 'required'
            ]
        ])) {
            return redirect()->to(site_url('wrong_email/' . $emailLama))->withInput();
        }
        $model = new LoginModel();
        $data = array(
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'email'         => $this->request->getVar('email'),
            'password'      => $this->request->getVar('password1'),
            'username'      => $this->request->getVar('username'),
        );
        $token = random_string('numeric', 6);
        $email = $this->request->getVar('email');
        $user_token = [
            'email' => $this->request->getVar('email'),
            'token' => $token,
            'date_created' => time()
        ];
        if ($user_token) {
            session()->set('get_email', $email);
            $this->change();
        }

        $model->ubahdata($data, $email);
        $model->ubahtoken($user_token, $email);

        $this->_sendEmail($token, 'verify');

        session()->setFlashdata('success', true);
        session()->setFlashdata('pesan', 'Kode Verifikasi Telah Dikirim Ke Email Anda');
        return redirect()->to('verifikasi');
    }
    public function resend_email()
    {
        $model = new LoginModel();
        $token = random_string('numeric', 6);
        $emaillama = session()->get('get_email');
        $cek_email = $model->cekemail($emaillama);
        $data = [
            'token' => $token
        ];
        $user_token = [
            'email' => $emaillama,
            'token' => $token,
            'date_created' => time()
        ];
        // var_dump($cek_email['email'], $user_token,);
        // die();
        if ($cek_email['email'] == '') {
            $model->tambahtoken($user_token);
            $this->_resendEmail($token, 'resend');
        } else {
            $model->resend_email($emaillama, $data);
            $this->_resendEmail($token, 'resend');
        }
        session()->setFlashdata('success', true);
        session()->setFlashdata('pesan', 'Kode Verifikasi Telah Dikirim Ke Email Anda');
        return redirect()->to('verifikasi');
    }
    public function resend_email_forgot()
    {
        $model = new LoginModel();
        $token = random_string('numeric', 6);
        $emaillama = session()->get('get_email');
        $cek_email = $model->cekemail($emaillama);
        $data = [
            'token' => $token
        ];
        $user_token = [
            'email' => $emaillama,
            'token' => $token,
            'date_created' => time()
        ];
        // var_dump($cek_email['email'], $user_token,);
        // die();
        if ($cek_email['email'] == '') {
            $model->tambahtoken($user_token);
            $this->_resendEmail($token, 'resendforgot');
        } else {
            $model->resend_email($emaillama, $data);
            $this->_resendEmail($token, 'resendforgot');
        }
        session()->setFlashdata('success', true);
        session()->setFlashdata('pesan', 'Kode Verifikasi Telah Dikirim Ke Email Anda');
        return redirect()->to('verifikasi_pass');
    }

    private function _resendEmail($token, $type)
    {
        $email = \Config\Services::email();
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'satudua.au@gmail.com',
            'smtp_pass' => 'mifta12345',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        $email->initialize($config);
        $email->setFrom('satudua.au@gmail.com', 'Login Program');
        $email->setTo(session()->get('get_email'));

        if ($type == 'resend') {
            $email->setSubject('Account Verification');
            $email->setMessage('<div style="margin-bottom: 12px; position: relative;
            text-align: center;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(72, 94, 144, 0.16);
            border-radius: 0.25rem; align-items: center !important; justify-content: center !important; font-family: Poppins, sans-serif;">
            <p style="font-size: 24px; 
            text-align:center; 
            font-weight: 700;
            margin-top: 24px;
            font-size: 22px;
            letter-spacing: -1px;
            color: inherit;
            align-items: center;
            position: relative;
            color: #031a61;">Kasir <span style="display: inline-block;
            font-weight: 400;
            color: #0168fa;">Kita</span></p>
        <h2 style="font-weight: 500;
            line-height: 1.25;
            color: #001737; margin-top: 12px; margin-bottom: 10px;font-family: Poppins, sans-serif;">Kasir Kita Sign-Up Verification Code</h2><p style="margin-bottom: 0px; margin-top: 8px; font-family: Poppins, sans-serif;">Thanks For Signing Up</p>
            <p style="margin-bottom: 24px; font-family: Poppins, sans-serif;">Please confirm your email address to get access to KasirKita</p>
            <h1 style="margin-bottom: 8px; font-family: Poppins, sans-serif;">' . $token . '</h1>
            <p style="margin-bottom: 16px; margin-top: 8px; font-family: Poppins, sans-serif;">Enter this code or click the button below.</p>
            
            <a href="' . base_url() . '/login/verify?email=' . session()->get('get_email') . '&token=' . urlencode($token) . '" style="margin-bottom: 24px; color: #fff;
            font-family: Poppins, sans-serif;
                background-color: #0168fa;
                text-decoration: none;
                border-color: #0168fa; display: inline-block;
                font-weight: 400;
                text-align: center;
                vertical-align: middle;
                user-select: none;
                border: 1px solid transparent;
                padding: 0.46875rem 0.9375rem;
                line-height: 1.5;
                border-radius: 0.25rem;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">Agree And Confirm Your Email</a>
            </div>
            
            <small style="text-align: center; font-family: Poppins, sans-serif;color: #8392a5; justify-content: center !important;display:flex;">You are receiving this email because you (or someone using this email) created an account on KasirKita using this address.</small>
            <p style="text-align:center; font-size: 10px;color: #8392a5; justify-content: center !important; font-family: Poppins, sans-serif;">&copy; 2021 KasirKita v1.0.0</p>');
        } else if ($type == 'resendforgot') {
            $email->setSubject('Reset Password');
            $email->setMessage('<div style="margin-bottom: 12px; position: relative;
            text-align: center;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(72, 94, 144, 0.16);
            border-radius: 0.25rem; align-items: center !important; justify-content: center !important; font-family: Poppins, sans-serif;">
            <p style="font-size: 24px; 
            text-align:center; 
            font-weight: 700;
            margin-top: 24px;
            font-size: 22px;
            letter-spacing: -1px;
            color: inherit;
            align-items: center;
            position: relative;
            color: #031a61;">Kasir <span style="display: inline-block;
            font-weight: 400;
            color: #0168fa;">Kita</span></p>
        <h2 style="font-weight: 500;
            line-height: 1.25;
            color: #001737; margin-top: 12px; margin-bottom: 10px;font-family: Poppins, sans-serif;">Kasir Kita Forgot Password Verification Code</h2>
            <p style="margin-bottom: 24px; font-family: Poppins, sans-serif;">Please confirm your email address to forgot password your KasirKita account.</p>
            <h1 style="margin-bottom: 8px; font-family: Poppins, sans-serif;">' . $token . '</h1>
            <p style="margin-bottom: 16px; margin-top: 8px; font-family: Poppins, sans-serif;">Enter this code or click the button below.</p>
            
            <a href="' . base_url() . '/login/resetpassword?email=' . session()->get('get_email') . '&token=' . urlencode($token) . '" style="margin-bottom: 24px; color: #fff;
            font-family: Poppins, sans-serif;
                background-color: #0168fa;
                text-decoration: none;
                border-color: #0168fa; display: inline-block;
                font-weight: 400;
                text-align: center;
                vertical-align: middle;
                user-select: none;
                border: 1px solid transparent;
                padding: 0.46875rem 0.9375rem;
                line-height: 1.5;
                border-radius: 0.25rem;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">Change Password</a>
            </div>
            
            <small style="text-align: center; font-family: Poppins, sans-serif;color: #8392a5; justify-content: center !important;display:flex;">You are receiving this email because you (or someone using this email) wanted to change the password for your KasirKita account.</small>
            <p style="text-align:center; font-size: 10px;color: #8392a5; justify-content: center !important; font-family: Poppins, sans-serif;">&copy; 2021 KasirKita v1.0.0</p>');
        }

        if ($email->send()) {
            return true;
        } else {
            echo $email->printDebugger();
            die;
        }
    }
    public function wrong_email($email)
    {
        $data = [
            'title' => 'Sign Up',
            'menu' => $this->LoginModel->getByEmail($email),
            'validation' => \Config\Services::validation()
        ];
        echo view('change_email', $data);
    }
    private function _sendEmail($token, $type)
    {
        $email = \Config\Services::email();
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'satudua.au@gmail.com',
            'smtp_pass' => 'mifta12345',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        $email->initialize($config);
        $email->setFrom('satudua.au@gmail.com', 'KasirKita Verification Code');
        $email->setTo($this->request->getVar('email'));

        if ($type == 'verify') {
            $email->setSubject('Account Verification');
            $email->setMessage('<div style="margin-bottom: 12px; position: relative;
            text-align: center;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(72, 94, 144, 0.16);
            border-radius: 0.25rem; align-items: center !important; justify-content: center !important; font-family: Poppins, sans-serif;">
            <p style="font-size: 24px; 
            text-align:center; 
            font-weight: 700;
            margin-top: 24px;
            font-size: 22px;
            letter-spacing: -1px;
            color: inherit;
            align-items: center;
            position: relative;
            color: #031a61;">Kasir <span style="display: inline-block;
            font-weight: 400;
            color: #0168fa;">Kita</span></p>
        <h2 style="font-weight: 500;
            line-height: 1.25;
            color: #001737; margin-top: 12px; margin-bottom: 10px;font-family: Poppins, sans-serif;">Kasir Kita Sign-Up Verification Code</h2><p style="margin-bottom: 0px; margin-top: 8px; font-family: Poppins, sans-serif;">Thanks For Signing Up</p>
            <p style="margin-bottom: 24px; font-family: Poppins, sans-serif;">Please confirm your email address to get access to KasirKita</p>
            <h1 style="margin-bottom: 8px; font-family: Poppins, sans-serif;">' . $token . '</h1>
            <p style="margin-bottom: 16px; margin-top: 8px; font-family: Poppins, sans-serif;">Enter this code or click the button below.</p>
            
            <a href="' . base_url() . '/login/verify?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '" style="margin-bottom: 24px; color: #fff;
            font-family: Poppins, sans-serif;
                background-color: #0168fa;
                text-decoration: none;
                border-color: #0168fa; display: inline-block;
                font-weight: 400;
                text-align: center;
                vertical-align: middle;
                user-select: none;
                border: 1px solid transparent;
                padding: 0.46875rem 0.9375rem;
                line-height: 1.5;
                border-radius: 0.25rem;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">Agree And Confirm Your Email</a>
            </div>
            
            <small style="text-align: center; font-family: Poppins, sans-serif;color: #8392a5; justify-content: center !important;display:flex;">You are receiving this email because you (or someone using this email) created an account on KasirKita using this address.</small>
            <p style="text-align:center; font-size: 10px;color: #8392a5; justify-content: center !important; font-family: Poppins, sans-serif;">&copy; 2021 KasirKita v1.0.0</p>');
        } else if ($type == 'forgot') {
            $email->setSubject('Reset Password');
            $email->setMessage('<div style="margin-bottom: 12px; position: relative;
            text-align: center;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(72, 94, 144, 0.16);
            border-radius: 0.25rem; align-items: center !important; justify-content: center !important; font-family: Poppins, sans-serif;">
            <p style="font-size: 24px; 
            text-align:center; 
            font-weight: 700;
            margin-top: 24px;
            font-size: 22px;
            letter-spacing: -1px;
            color: inherit;
            align-items: center;
            position: relative;
            color: #031a61;">Kasir <span style="display: inline-block;
            font-weight: 400;
            color: #0168fa;">Kita</span></p>
        <h2 style="font-weight: 500;
            line-height: 1.25;
            color: #001737; margin-top: 12px; margin-bottom: 10px;font-family: Poppins, sans-serif;">Kasir Kita Forgot Password Verification Code</h2>
            <p style="margin-bottom: 24px; font-family: Poppins, sans-serif;">Please confirm your email address to forgot password your KasirKita account.</p>
            <h1 style="margin-bottom: 8px; font-family: Poppins, sans-serif;">' . $token . '</h1>
            <p style="margin-bottom: 16px; margin-top: 8px; font-family: Poppins, sans-serif;">Enter this code or click the button below.</p>
            
            <a href="' . base_url() . '/login/resetpassword?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '" style="margin-bottom: 24px; color: #fff;
            font-family: Poppins, sans-serif;
                background-color: #0168fa;
                text-decoration: none;
                border-color: #0168fa; display: inline-block;
                font-weight: 400;
                text-align: center;
                vertical-align: middle;
                user-select: none;
                border: 1px solid transparent;
                padding: 0.46875rem 0.9375rem;
                line-height: 1.5;
                border-radius: 0.25rem;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">Change Password</a>
            </div>
            
            <small style="text-align: center; font-family: Poppins, sans-serif;color: #8392a5; justify-content: center !important;display:flex;">You are receiving this email because you (or someone using this email) wanted to change the password for your KasirKita account.</small>
            <p style="text-align:center; font-size: 10px;color: #8392a5; justify-content: center !important; font-family: Poppins, sans-serif;">&copy; 2021 KasirKita v1.0.0</p>');
        }

        if ($email->send()) {
            return true;
        } else {
            echo $email->printDebugger();
            die;
        }
    }
    public function verify()
    {
        $model = new LoginModel();
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        $user = $model->cek_user($email);
        if ($user['email'] == $email) {
            $user_token = $model->cek_token($email, $token);
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $data = ['is_active'    => '1'];
                    $model->ubahuser($email, $data) && $model->hapustoken($email);
                    session()->setFlashdata('success', true);
                    session()->setFlashdata('pesan', 'Akun Anda Sudah Terverifikasi');
                    return redirect()->to(site_url('login/kategori'));
                } else {
                    $model->hapustoken($email);
                    return redirect()->to(site_url('login'));
                }
            } else {
                return redirect()->to(site_url('login'));
            }
        } else {
            return redirect()->to(site_url('login'));
        }
    }
    public function verifnotlink()
    {
        if (!$this->validate([
            'token' => [
                'rules' => 'required|trim|max_length[6]|numeric',
                'errors' => [
                    'required' => 'Kode Verifikasi Tidak Boleh Kosong',
                    'max_length' => 'Kode Verifikasi Harus 6 Digit',
                    'numeric' => 'Kode Verifikasi Harus Angka',
                ]
            ],
        ])) {
            return redirect()->to('verifikasi')->withInput();
        }
        $model = new LoginModel();
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        $user = $model->cek_user($email);
        if ($user['email'] == $email) {
            $user_token = $model->cek_token($email, $token);
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $data = ['is_active'    => '1'];
                    $model->ubahuser($email, $data) && $model->hapustoken($email);
                    session()->setFlashdata('success', true);
                    session()->setFlashdata('pesan', 'Akun Anda Sudah Terverifikasi');
                    return redirect()->to(site_url('login/kategori'));
                } else {
                    $model->hapustoken($email);
                    session()->setFlashdata('success', true);
                    session()->setFlashdata('bahaya', 'Akun Anda Gagal Terverifikasi');
                    return redirect()->to(site_url('login'));
                }
            } else {
                session()->setFlashdata('success', true);
                session()->setFlashdata('error', 'Kode Yang Anda Masukkan Salah');
                session()->setFlashdata('word', 'Silahkan Periksa Kembali Pada Email Anda');
                return redirect()->to(base_url('login/verifikasi'));
            }
        }
    }

    public function forgot()
    {
        $data = [
            'title' => 'Forgot Password',
            'validation' => \Config\Services::validation()
        ];
        echo view('forgotpassword', $data);
    }
    public function forgotPassword()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|trim|valid_email',
                'errors' => [
                    'required' => 'Email Tidak Boleh Kosong',
                    'valid_email' => 'Format email yang anda masukkan salah'
                ]
            ],
        ])) {
            return redirect()->to('forgot')->withInput();
        } else {
            $model = new LoginModel();
            $email = $this->request->getVar('email');

            $user = $model->cek_user($email);

            if (($user['email'] == $email) && ($user['is_active'] == 1)) {
                $token = random_string('numeric', 6);
                $user_token = [
                    'email' => $this->request->getVar('email'),
                    'token' => $token,
                    'date_created' => time()
                ];
                if ($user_token) {
                    session()->set('get_email', $email);
                }
                $model->tambahtoken($user_token);
                $this->_sendEmail($token, 'forgot');
                session()->setFlashdata('success', true);
                session()->setFlashdata('pesan', 'Kode Verifikasi Telah Dikirim Ke Email Anda');
                return redirect()->to('verifikasi_pass');
            } else {
                session()->setFlashdata('success', true);
                session()->setFlashdata('bahaya1', 'Akun Belum Aktif');
                session()->setFlashdata('txt', 'Silahkan Verifikasi Terlebih Dahulu');
                return redirect()->to(site_url('login'));
            }
        }
    }
    public function verifikasi_pass()
    {
        $data = [
            'title' => 'Verifikasi Password',
            'validation' => \Config\Services::validation(),
            'email' => $this->request->getVar('email'),
        ];
        echo view('verifikasi_pass', $data);
    }
    public function resetpassword()
    {
        $model = new LoginModel();
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        $user = $model->cek_user($email);
        if ($user['email'] == $email) {
            $user_token = $model->cek_token($email, $token);
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    session()->set('reset_email', $email);
                    $this->change();
                    session()->setFlashdata('success', true);
                    session()->setFlashdata('pesan', 'Akun Anda Sudah Terverifikasi');
                    return redirect()->to('changepassverif');
                }
            } else {
                return redirect()->to(site_url('login'));
            }
        } else {
            return redirect()->to(site_url('login'));
        }
    }
    public function resetpassword_notlink()
    {
        if (!$this->validate([
            'token' => [
                'rules' => 'required|trim|max_length[6]|numeric',
                'errors' => [
                    'required' => 'Kode Verifikasi Tidak Boleh Kosong',
                    'max_length' => 'Kode Verifikasi Harus 6 Digit',
                    'numeric' => 'Kode Verifikasi Harus Angka',
                ]
            ],
        ])) {
            return redirect()->to('verifikasi_pass')->withInput();
        }
        $model = new LoginModel();
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $user = $model->cek_user($email);
        if ($user['email'] == $email) {
            $user_token = $model->cek_token($email, $token);
            // var_dump($user_token);
            // die();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    session()->set('reset_email', $email);
                    session()->setFlashdata('success', true);
                    session()->setFlashdata('pesan', 'Akun Anda Sudah Terverifikasi');
                    return redirect()->to('changepassverif');
                }
            } else {
                session()->setFlashdata('success', true);
                session()->setFlashdata('error', 'Kode Yang Anda Masukkan Salah');
                session()->setFlashdata('word', 'Silahkan Periksa Kembali Pada Email Anda');
                return redirect()->to(base_url('login/verifikasi_pass'));
            }
        }
    }
    public function changepassverif()
    {
        $data = [
            'title' => 'Change Password',
            'validation' => \Config\Services::validation()
        ];
        echo view('changepassword', $data);
    }
    public function change()
    {
        if (!session()->get('reset_email')) {
            return redirect()->to(site_url('login'));
        }
        $data = [
            'title' => 'Change Password',
            'validation' => \Config\Services::validation()
        ];
        echo view('changepassword', $data);
    }
    public function changePassword()
    {
        if (!$this->validate([
            'password1' => [
                'rules' => 'required|trim|min_length[5]|matches[password2]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'matches' => 'Password Tidak Sama!',
                    'min_length' => 'Password Minimal 5 Karakter',
                ]
            ],
            'password2' => [
                'rules' => 'required|trim|min_length[5]|matches[password1]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'matches' => 'Password Tidak Sama!',
                    'min_length' => 'Password Minimal 5 Karakter',
                ]
            ],
        ])) {
            return redirect()->to('changepassverif')->withInput();
        }
        $model = new LoginModel();
        $password = $this->request->getVar('password1');
        $email =  session()->get('reset_email');

        $data = ['password'    => $password];
        if ($model->ubahuser($email, $data) && $model->hapustoken($email)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('pesan', 'Password Anda Berhasil Dirubah');
            session()->remove('reset_email');
            return redirect()->to(site_url('login'));
        } else {
            session()->setFlashdata('success', true);
            session()->setFlashdata('bahaya', 'Password Anda Gagal Dirubah');
            session()->remove('reset_email');
            return redirect()->to('changepassverif');
        }
    }
    public function verifikasi()
    {
        $id = session()->get('get_email');
        $data = [
            'title' => 'Verifikasi',
            'validation' => \Config\Services::validation(),
            'menu' => $this->LoginModel->getByEmail($id),
            'email' => $this->request->getVar('email'),
        ];
        echo view('verifikasi', $data);
    }
    public function kategori()
    {
        $model = new SubkategoriModel();
        $model2 = new KategoriBisnisModel();
        $model3 = new KotaModel();
        $data = [
            'validation' => \Config\Services::validation(),
            'title' => 'Kategori',
            'currentpage' => 'Kategori Access',
            'subkategori' => $model->getdatakategori(),
            'kategori' => $model2->getUsers(),
            'kota' => $model3->getUsers(),
            'db' => \Config\Database::connect(),
        ];
        echo view('kategori_access', $data);
    }
    public function kategori_access()
    {
        $model  = new LoginModel();
        $model2 = new OutletModel();
        $email  = $this->request->getVar('email');
        $user = $model->cek_user($email);
        if (!$this->validate([
            'nama_bisnis' => [
                'rules' => 'required|is_unique[db_login.nama_bisnis]',
                'errors' => [
                    'required' => 'Nama Bisnis Tidak Boleh Kosong',
                    'is_unique' => 'Nama Bisnis Sudah Terdaftar',
                ]
            ],
            'nama_bisnis' => [
                'rules' => 'required|is_unique[db_outlet.nama_bisnis]',
                'errors' => [
                    'required' => 'Nama Bisnis Tidak Boleh Kosong',
                    'is_unique' => 'Nama Bisnis Sudah Terdaftar',
                ]
            ],
            'nama_outlet' => [
                'rules' => 'required|is_unique[db_outlet.nama_outlet]',
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
                'rules' => 'required|numeric|trim',
                'errors' => [
                    'required' => 'No. Telepon Outlet Tidak Boleh Kosong',
                    'numeric'=> 'No. Telepon Harus Angka'
                ]
            ],
            'subkategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kategori Tidak Boleh Kosong',
                ]
            ],
            'kota_kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota Kabupaten Tidak Boleh Kosong',
                ]
            ],
        ])) {
            return redirect()->to('kategori')->withInput();
        }
        if ($user['email'] == $email) {   
            $data = [
                'kategori'       => $this->request->getVar('id_kategori'),
                'subkategori'    => $this->request->getVar('subkategori'),
                'nama_bisnis'    => $this->request->getVar('nama_bisnis'),
                'kota_kabupaten' => $this->request->getVar('kota'),
                'provinsi'       => $this->request->getVar('provinsi'),
            ];
            $model->ubahuser($email, $data); 
            $dataOutlet = [
                'nama_outlet'   => $this->request->getVar('nama_outlet') .' Pusat',
                'nama_bisnis'   => $this->request->getVar('nama_bisnis'),
                'alamat'        => $this->request->getVar('alamat'),
                'kota_id'       => $this->request->getVar('kota_kabupaten'),
                'kota'          => $this->request->getVar('kota'),
                'provinsi'      => $this->request->getVar('provinsi'),
                'telpon'        => $this->request->getVar('telpon'),
            ];
            $model2->insert($dataOutlet);
            session()->setFlashdata('success', true);
            session()->setFlashdata('pesan', 'Kategori Telah Disimpan, Silakan Login!');
            session()->remove('get_email');
            return redirect()->to(site_url('login'));
        } else {
            return redirect()->to(site_url('ketegori'));
        }
    }
}
