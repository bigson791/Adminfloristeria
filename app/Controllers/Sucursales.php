<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresasModelo;
use App\Models\SucursalesModelo;
use App\Models\PaisesModelo;

class Sucursales extends BaseController
{
    protected $sucursales;
    protected $empresas;
    protected $paises;
    protected $reglas;

    public function __construct()
    {
        $this->sucursales = new SucursalesModelo();
        $this->empresas = new EmpresasModelo();

        helper(['form']);
        $this->reglas = [
            'nombre' => [
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
            ],
        ];
    }
    public function index($activo = 'A')
    {

        $sucursales = $this->sucursales->where('suc_estado', $activo)->findAll();

        $data = ['titulo' => 'Sucursales', 'sucursales' => $sucursales];

        echo view('header');
        echo view('sucursales/sucursales', $data);
        echo view('footer');
    }

    public function seeDeleteBranch($activo = 'E')
    {

        $sucursales = $this->sucursales->where('suc_estado', $activo)->findAll();
        $data = ['titulo' => 'sucursales Eliminadas', 'sucursales' => $sucursales];

        echo view('header');
        echo view('sucursales/sucursalesEliminadas', $data);
        echo view('footer');
    }

    public function newBranch()
    {
        $empresas = $this->empresas->where('emp_estado', 'A')->findAll();
        $data = ['titulo' => 'Agregar Nueva Sucursal', 'empresas' => $empresas];

        echo view('header');
        echo view('sucursales/nuevaSucursal', $data);
        echo view('footer');
    }

    public function insertBranch()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sucursales->save(
                [
                    'suc_nombre' => $this->request->getPost('nombre'), 'suc_direccion' => $this->request->getPost('Direccion'), 'suc_telefono' => $this->request->getPost('telefono'),
                    'suc_empresa' => intval($this->request->getPost('empresa')), 'suc_estado' => 'A'
                ]

            );
            return redirect()->to(base_url() . "sucursales");
        } else {
            $empresas = $this->empresas->where('emp_estado', 'A')->findAll();
            $data = ['titulo' => 'Agregar Nueva Empresa', 'validation' => $this->validator, 'empresas' => $empresas];
            echo view('header');
            echo view('sucursales/nuevaSucursal', $data);
            echo view('footer');
        }
    }

    public function upBranch($idSucursal, $valid = null)
    {
        $empresas = $this->empresas->where('emp_estado', 'A')->findAll();
        $sucursal = $this->sucursales->where('suc_id', $idSucursal)->first();
        if ($valid != null) {
            $data = ['titulo' => 'Editando Sucursal', 'empresas' => $empresas, 'datos' => $sucursal, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editando Cliente', 'empresas' => $empresas, 'datos' => $sucursal,];
        }


        echo view('header');
        echo view('sucursales/editarSucursal', $data);
        echo view('footer');
    }

    public function updateBranch()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sucursales->update(
                $this->request->getPost('codigoSucursal'),
                [
                    'suc_nombre' => $this->request->getPost('nombre'), 'suc_direccion' => $this->request->getPost('Direccion'), 'suc_telefono' => $this->request->getPost('telefono'),
                    'suc_empresa' => intval($this->request->getPost('empresa')), 'suc_estado' => 'A'
                ]
            );
            return redirect()->to(base_url() . "sucursales");
        } else {
            return $this->upBranch($this->request->getPost('codigoSucursal'), $this->validator);
        }
    }

    public function deleteBranch($idBranch)
    {
        $this->sucursales->update(
            $idBranch,
            ['suc_estado' => 'E']
        );
        return redirect()->to(base_url() . "sucursales");
    }

    public function reEnterBranch($idBranch)
    {
        $this->sucursales->update(
            $idBranch,
            ['suc_estado' => 'A']
        );
        return redirect()->to(base_url() . "SucursalesEliminadas");
    }
}
