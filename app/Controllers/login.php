<?php

namespace App\Controllers;
use App\Models\M_trader;
use App\Models\LoginHistoryModel;

class Login extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('login');
        echo view('footer');
    }

    public function aksi_login()
    {
        $u = $this->request->getPost('nama_users');
        $p = $this->request->getPost('password');

        $where = array(
            'nama_users' => $u,
            'password' => md5($p),
            //'status' =>'verified'
        );
        $model = new M_trader();
        $cek = $model->getWhere('users', $where);

        if ($cek > 0) {
            session()->set('nama_users', $cek->nama_users);
            session()->set('id_users', $cek->id_users);
            session()->set('level', $cek->id_level);

            // Simpan riwayat login
            $transaksi_data = [
            'id_users' => $cek->id_users,
            'nama_users' => $cek->nama_users,
            'login_time' => date('Y-m-d H:i:s')
        ];

        // Simpan data ke tabel transaksi
        $model->tambah('hs_login', $transaksi_data);
            

            return redirect()->to('home/dashboard');
        } else {
            return redirect()->to('home/login');
        }
    }

    public function log_out()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
