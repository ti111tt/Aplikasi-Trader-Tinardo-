<?php

namespace App\Controllers;
use App\Models\M_trader;

class pt extends BaseController
{
    public function index()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
        $where=array('id_pt'=>session()->get('id'));
        $data ['riz'] = $model->tampil('pt'); 

        echo view('header');
        echo view('menu');
        echo view('pt',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
}