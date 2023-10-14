<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModelo;
use App\Models\PaisesModelo;

class Clientes extends BaseController
{
    protected $clientes;
    protected $paises;
    protected $reglas;

    public function __construct()
    {
        $this->clientes = new ClienteModelo();
        $this->paises = new PaisesModelo();

        helper(['form']);
        $this->reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'apellidos' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'telefono' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'pais' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'empresa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ]
        ];
    }
    public function index($activo = 'A')
    {

        $clientes = $this->clientes->where('cl_estado', $activo)->findAll();

        $data = ['titulo' => 'Clientes', 'Clientes' => $clientes];

        echo view('header');
        echo view('clientes/clientes', $data);
        echo view('footer');
    }

    public function seeDeleteCustumer($activo = 'E')
    {

        $clientes = $this->clientes->where('cl_estado', $activo)->findAll();
        $data = ['titulo' => 'Clientes Eliminados', 'Clientes' => $clientes];

        echo view('header');
        echo view('clientes/clientesEliminados', $data);
        echo view('footer');
    }

    public function newCustumer()
    {
        $paises = $this->paises->findAll();
        $data = ['titulo' => 'Agregar Nuevo Cliente', 'Paises' => $paises];

        echo view('header');
        echo view('clientes/nuevoCliente', $data);
        echo view('footer');
    }

    public function insertCustumer()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->clientes->save(
                [
                    'cl_nombres' => $this->request->getPost('nombre'), 'cl_apellidos' => $this->request->getPost('apellidos'), 'cl_telefono' => $this->request->getPost('telefono'),
                    'cl_nit' => $this->request->getPost('nit'), 'cl_correo' => $this->request->getPost('correo'),
                    'cl_pais' => $this->request->getPost('pais'), 'fk_empresa' => $this->request->getPost('empresa'), 'cl_estado' => 'A'
                ]

            );
            return redirect()->to(base_url() . "clientes");
        } else {
            $paises = $this->paises->findAll();
            $data = ['titulo' => 'Agregar Nuevo Cliente', 'validation' => $this->validator, 'Paises' => $paises];
            echo view('header');
            echo view('clientes/nuevoCliente', $data);
            echo view('footer');
        }
    }

    public function upCustumer(string $idCliente, $valid=null)
    {
        $paises = $this->paises->findAll();
        $cliente = $this->clientes->where('cl_id', $idCliente)->first();
        if($valid != null){
            $data = ['titulo' => 'Editando Cliente', 'datos' => $cliente, 'Paises' => $paises, 'validation'=>$valid];
        }else{
            $data = ['titulo' => 'Editando Cliente', 'datos' => $cliente, 'Paises' => $paises];
        }
       

        echo view('header');
        echo view('clientes/editarCliente', $data);
        echo view('footer');
    }

    public function updateCustumer()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->clientes->update(
                $this->request->getPost('codigoPersona'),
                [
                    'cl_id' => $this->request->getPost('codigoPersona'), 'cl_nombres' => $this->request->getPost('nombre'), 'cl_apellidos' => $this->request->getPost('apellidos'), 'cl_telefono' => $this->request->getPost('telefono'),
                    'cl_nit' => $this->request->getPost('nit'), 'cl_correo' => $this->request->getPost('correo'),
                    'cl_pais' => $this->request->getPost('pais'), 'fk_empresa' => $this->request->getPost('empresa')
                ]
            );
            return redirect()->to(base_url() . "clientes");
        } else {
            return $this->upCustumer($this->request->getPost('codigoPersona'), $this->validator);
        }
    }

    public function deleteCustumer($idCliente)
    {
        $this->clientes->update(
            $idCliente,
            ['cl_estado' => 'E']
        );
        return redirect()->to(base_url() . "clientes");
    }

    public function reEnterCusumer($idCliente)
    {
        $this->clientes->update(
            $idCliente,
            ['cl_estado' => 'A']
        );
        return redirect()->to(base_url() . "ClientesEliminados");
    }
}
