<?php

namespace App\Controllers;
use App\Models\M_trader;

class bk extends BaseController
{
    public function index()
    {
        
        $model = new M_trader();
        $where=array('id_bk'=>session()->get('id'));
        $data ['riz'] = $model->tampil('bk'); 

        echo view('header');
        echo view('menu');
        echo view('bk',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
}