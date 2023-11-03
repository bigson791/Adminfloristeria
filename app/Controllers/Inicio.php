<?php

namespace App\Controllers;

class Inicio extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('inicio/index');
        echo view('footer');
    }
}
