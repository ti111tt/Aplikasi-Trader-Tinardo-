<?php

namespace App\Controllers;
use App\Models\M_trader;

class karyawan extends BaseController
{
    public function index()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
        $where=array('id_kry'=>session()->get('id'));
        $data ['riz'] = $model->tampil('karyawan'); 

        echo view('header');
        echo view('menu');
        echo view('karyawan',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
}