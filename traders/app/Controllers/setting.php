<?php

namespace App\Controllers;
use App\Models\M_trader;

class pt extends BaseController
{
    public function index()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
        $where=array('id_sett'=>session()->get('id'));
        $data ['riz'] = $model->tampil('setting'); 

        echo view('header');
        echo view('menu');
        echo view('setting',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
}