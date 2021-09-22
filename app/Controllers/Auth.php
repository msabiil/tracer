<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index() // langsung edirect ke login
    {
        return redirect()->to(site_url('login'));
    }

    public function login() // view login
    {
        // if (session('username')) {
        //     return redirect()->to(site_url('home')); //jika mau mengakses ke login lagi tidak bisa
        // }
        // return view('auth/login');

        // $data = array(
        //     'title' => 'Login',
        // );
        return view('auth/login');
    }


    public function register() // fungsi register alumni
    {
        return view('auth/register');
    }

    public function logout()
    {

        session()->remove('log');
        session()->remove('nama_lengkap');
        session()->remove('username');
        session()->remove('akses');
        session()->setFlashData('pesan', 'logout sukses...!');
        session()->remove('id_alumni');
        session()->destroy();
        return redirect()->to(site_url('login'));
    }


    public function loginProcess() // mengarahkan dari login ke home
    {
        $post = $this->request->getPost();
        $query = $this->db->table('alumni')->getWhere(['username' => $post['username']]);
        $user = $query->getRow();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $this->ModelAuth->login($username, $password);
        if ($user) {
            session()->set('log', true);
            session()->set('nama_lengkap', $user['nama_lengkap']);
            session()->set('username', $user['username']);
            session()->set('akses', $user['akses']);
            return redirect()->to(site_url('home'));
        } else {
            return redirect()->back()->with('error', ' username / password tidak sesuai');
        }
    }


    public function saveregister()
    {
        if ($this->validate([
            'nama_lengkap'  => [
                'label' => 'nama lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'tempat_lahir'  => [
                'label' => 'tempat lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'tanggal_lahir'  => [
                'label' => 'tanggal lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'alamat'  => [
                'label' => 'alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'no_telpon'  => [
                'label' => 'nomor telpon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'email'  => [
                'label' => 'email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'password'  => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'username'  => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'program_studi'  => [
                'label' => 'program studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'kelulusan'  => [
                'label' => 'kelulusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
        ])) {
            //jika valid
            $data = array(
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telpon' => $this->request->getPost('no_telpon'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'username' => $this->request->getPost('username'),
                'program_studi' => $this->request->getPost('program_studi'),
                'akses' => 2
            );
            $this->ModelAuth->saveregister($data);

            session()->setFlashdata('success', 'register berhasil dilakukan,silahkan login');
            return redirect()->to(base_url('Auth/login'));
        } else {
            //jika tidak valid
            session()->setFlashData('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/register'));
        }
    }

    // public function loginProcess() // mengarahkan dari login ke home
    // {
    //     $post = $this->request->getPost();
    //     $query = $this->db->table('alumni')->getWhere(['username' => $post['usernamee']]);
    //     $user = $query->getRow();
    //     if ($user) {
    //         if (password_verify($post['password'], $alumni->password)) {
    //             $params = ['id_alumni' => $alumni->id_alumni];
    //             session()->set($params);

    //             return redirect()->to(site_url('home'));
    //         } else {
    //             return redirect()->back()->with('error', ' password tidak dsesuai');
    //         }
    //     } else {
    //         return redirect()->back()->with('error', 'email tidak ditemukan');
    //     }
    // }
}
