<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresasModelo;
use App\Models\PaisesModelo;

class Empresas extends BaseController
{
    protected $empresas;
    protected $paises;
    protected $reglas;

    public function __construct()
    {
        $this->empresas = new EmpresasModelo();
        $this->paises = new PaisesModelo();

        helper(['form']);
        $this->reglas = [
            'nombre' => [
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
            'nit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'UrldelLogo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ]
        ];
    }
    public function index($activo = 'A')
    {

        $empresas = $this->empresas->where('emp_estado', $activo)->findAll();

        $data = ['titulo' => 'Empresas', 'empresas' => $empresas];

        echo view('header');
        echo view('empresas/empresas', $data);
        echo view('footer');
    }

    public function seeDeleteCompany($activo = 'E')
    {

        $empresas = $this->empresas->where('emp_estado', $activo)->findAll();
        $data = ['titulo' => 'empresas Eliminadas', 'empresas' => $empresas];

        echo view('header');
        echo view('empresas/empresasEliminadas', $data);
        echo view('footer');
    }

    public function newCompany()
    {
        $data = ['titulo' => 'Agregar Nueva Empresa'];

        echo view('header');
        echo view('empresas/nuevaEmpresa', $data);
        echo view('footer');
    }

    public function insertCompany()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->empresas->save(
                [
                    'emp_nombre' => $this->request->getPost('nombre'), 'emp_direccion' => $this->request->getPost('Direccion'), 'emp_telefono' => $this->request->getPost('telefono'),
                    'emp_nit' => $this->request->getPost('nit'), 'emp_logo' => $this->request->getPost('UrldelLogo'), 'emp_estado' => 'A'
                ]

            );
            return redirect()->to(base_url() . "empresas");
        } else {
            $data = ['titulo' => 'Agregar Nueva Empresa', 'validation' => $this->validator];
            echo view('header');
            echo view('empresas/nuevaEmpresa', $data);
            echo view('footer');
        }
    }

    public function upCompany(string $idEmpresa, $valid = null)
    {
        $paises = $this->paises->findAll();
        $empresa = $this->empresas->where('emp_id', $idEmpresa)->first();
        if ($valid != null) {
            $data = ['titulo' => 'Editando Empresa', 'datos' => $empresa, 'Paises' => $paises, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editando Cliente', 'datos' => $empresa, 'Paises' => $paises];
        }


        echo view('header');
        echo view('empresas/editarEmpresa', $data);
        echo view('footer');
    }

    public function updateCompany()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->empresas->update(
                $this->request->getPost('codigoEmpresa'),
                [
                    'emp_nombre' => $this->request->getPost('nombre'), 'emp_direccion' => $this->request->getPost('Direccion'), 'emp_telefono' => $this->request->getPost('telefono'),
                    'emp_nit' => $this->request->getPost('nit'), 'emp_logo' => $this->request->getPost('UrldelLogo'), 'emp_estado' => 'A'
                ]
            );
            return redirect()->to(base_url() . "empresas");
        } else {
            return $this->upCompany($this->request->getPost('codigoEmpresa'), $this->validator);
        }
    }

    public function deleteCompany($idCompany)
    {
        $this->empresas->update(
            $idCompany,
            ['emp_estado' => 'E']
        );
        return redirect()->to(base_url() . "empresas");
    }

    public function reEnterCompany($idCompany)
    {
        $this->empresas->update(
            $idCompany,
            ['emp_estado' => 'A']
        );
        return redirect()->to(base_url() . "EmpresasEliminados");
    }
}
