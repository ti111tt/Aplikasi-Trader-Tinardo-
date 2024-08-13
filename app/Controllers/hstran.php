<?php

namespace App\Controllers;

use App\Models\M_trader;

class hslogin extends BaseController
{
    public function index()
    {
        if (session()->get('level') > 0) { 
            $model = new M_trader();
            $id_transaksi= session()->get('id');
            $data['jojo'] = $model->getLoginHistoryByUserId($id_transaksi);

            echo view('header');
            echo view('menu');
            echo view('hs_login', $data);
            echo view('footer');
        } else {
            return redirect()->to('home/login');
        }
    }
}
