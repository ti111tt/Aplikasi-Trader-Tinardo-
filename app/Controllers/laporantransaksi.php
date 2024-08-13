<?php

namespace App\Controllers;
use App\Models\M_trader;

class transaksi extends BaseController
{
    public function index()
    {
       
        $model = new M_trader();
        $where=array('id_transaksi'=>session()->get('id'));
        $data ['riz'] = $model->tampil('transaksi'); 

        echo view('header');
        echo view('menu');
        echo view('transaksi',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
}