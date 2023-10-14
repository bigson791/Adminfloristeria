<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModelo;
use App\Models\PaisesModelo;

class Pedidos extends BaseController
{
    protected $clientes;
    protected $paises;

    public function __construct()
    {
        $this->clientes = new ClienteModelo();
        $this->paises = new PaisesModelo();
    }
    public function index($activo = 'A')
    {

        $clientes = $this->clientes->where('cl_estado', $activo)->findAll();

        $data = ['titulo' => 'Pedidos', 'Clientes' => $clientes];

        echo view('header');
        echo view('pedidos/pedidos', $data);
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
        if ($this->request->getMethod() == "post" && $this->validate([
            'nombre' => 'required', 'apellidos' => 'required',
            'telefono' => 'required', 'pais' => 'required', 'empresa' => 'required'
        ])) {
            $this->clientes->save(
                [
                    'cl_nombres' => $this->request->getPost('nombre'), 'cl_apellidos' => $this->request->getPost('apellidos'), 'cl_telefono' => $this->request->getPost('telefono'),
                    'cl_nit' => $this->request->getPost('nit'), 'cl_correo' => $this->request->getPost('correo'),
                    'cl_pais' => $this->request->getPost('pais'), 'fk_empresa' => $this->request->getPost('empresa'), 'cl_estado' => 'A'
                ]

            );
            return redirect()->to(base_url() . "clientes");
        } else {
            $data = ['titulo' => 'Agregar Nuevo Cliente', 'validation' => $this->validator];
            echo view('header');
            echo view('clientes/nuevoCliente', $data);
            echo view('footer');
        }
    }

    public function upCustumer(string $idCliente)
    {
        $paises = $this->paises->findAll();
        $cliente = $this->clientes->where('cl_id', $idCliente)->first();
        $data = ['titulo' => 'Editando Cliente', 'datos' => $cliente, 'Paises' => $paises];

        echo view('header');
        echo view('clientes/editarCliente', $data);
        echo view('footer');
    }

    public function updateCustumer()
    {
        if ($this->request->getMethod() == "post" && $this->validate([
            'nombre' => 'required', 'apellidos' => 'required',
            'telefono' => 'required', 'pais' => 'required', 'empresa' => 'required'
        ])) {
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
            $data = ['titulo' => 'Agregar Nuevo Cliente', 'validation' => $this->validator];
            echo view('header');
            echo view('clientes/editarCliente', $data);
            echo view('footer');
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
