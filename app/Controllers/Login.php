<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModelo;
use App\Models\UsuariosModel;

class Login extends BaseController
{
    protected $clientes, $reglas, $usuarios;

    public function __construct()
    {
        $this->clientes = new ClienteModelo();
        $this->usuarios = new UsuariosModel();
        helper(['form']);
        $this->reglas = [
            'usuario' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'passwrd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ]
        ];
    }
    public function index()
    {

        // $clientes = $this->clientes->where('cl_estado', $activo)->findAll();
        // $data = ['titulo'=>'Clientes','Clientes'=>$clientes];

        //echo view('header');
        echo view('login/index');
        //echo view('footer');

    }

    public function validar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $usuario = $this->request->getPost('usuario');
            $contra = $this->request->getPost('passwrd');

            $datosUsuario = $this->usuarios->where('us_usuario', $usuario)->first();

            if ($datosUsuario != null) {
                if (password_verify($contra, $datosUsuario['us_passwrd'])) {
                    $datosSession = [
                        'id_usuario' => $datosUsuario['us_id'],
                        'nombre' => $datosUsuario['us_nombres'],
                        'Apellidos' => $datosUsuario['us_apellidos'],
                        'rol' => $datosUsuario['us_rol'],
                        'caja' => $datosUsuario['us_id_caja'],
                    ];

                    $session = session();
                    $session->set($datosSession);
                    return redirect()->to(base_url() . 'productos');
                } else {
                    $data['error'] = 'Las contraseñas no coinciden';
                    echo view('login/index', $data);
                }
            } else {
                $data['error'] = 'El usuario ingresado no existe';
                echo view('login/index',$data);
            }
        }else{
            $data = ['validation'=>$this->validator];
            echo view('login/index',$data);
        }
    }

    public function logout(){

        $session = session();
        $session->destroy();
        return redirect()->to(base_url().'login');
    }
}
