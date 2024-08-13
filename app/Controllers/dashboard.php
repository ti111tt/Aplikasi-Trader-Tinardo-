<?php

namespace App\Controllers;
use App\Models\M_trader;

class Dashboard extends BaseController
{
    public function dashboard()
    {
         if(session()->get('level')>0) {
         $model = new M_trader();
         $where=array(
            'id_toko'=>1
        );
         $data['setting'] = $model->getWhere('toko', $where);
        echo view('header');
        echo view('menu', $data);
        echo view('dashboard');
        echo view('footer');

     }else{
        return redirect()->to('home/login');
}
}
}