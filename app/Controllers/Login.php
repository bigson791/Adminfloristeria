<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModelo;

class Login extends BaseController
{
    protected $clientes;

    public function __construct()
    {
        $this->clientes = new ClienteModelo(); 
    }
public function index($activo = 'A'){

    // $clientes = $this->clientes->where('cl_estado', $activo)->findAll();
    // $data = ['titulo'=>'Clientes','Clientes'=>$clientes];

    //echo view('header');
    echo view('login/index.php');
    //echo view('footer');

}

}
