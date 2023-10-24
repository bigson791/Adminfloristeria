<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartamentosModelo;
use App\Models\MunicipiosModelo;
use App\Models\ZonasEnvioModelo;

class ZonasEnvio extends BaseController
{
    protected $municipios;
    protected $departamentos;
    protected $zonasenvio;
    protected $reglas;

    public function __construct()
    {
        $this->municipios = new MunicipiosModelo();
        $this->departamentos = new  DepartamentosModelo();
        $this->zonasenvio = new ZonasEnvioModelo();

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

        $zonasenvio = $this->zonasenvio->where('env_estado', $activo)->findAll();

        $data = ['titulo' => 'Zonas Envío', 'zonasenvio' => $zonasenvio];

        echo view('header');
        echo view('zonasenvio/zonasenvio', $data);
        echo view('footer');
    }

    public function seeDeleteCompany($activo = 'E')
    {

        $zonasenvio = $this->zonasenvio->where('emp_estado', $activo)->findAll();
        $data = ['titulo' => 'Zonas Envío Eliminadas', 'zonasenvio' => $zonasenvio];

        echo view('header');
        echo view('zonasenvio/zonasenvioEliminadas', $data);
        echo view('footer');
    }

    public function newShipping()
    {
        $data = ['titulo' => 'Agregar Nueva ZonaEnvio'];

        echo view('header');
        echo view('zonasenvio/nuevaZonaEnvio', $data);
        echo view('footer');
    }

    public function insertShipping()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->zonasenvio->save(
                [
                    'emp_nombre' => $this->request->getPost('nombre'), 'emp_direccion' => $this->request->getPost('Direccion'), 'emp_telefono' => $this->request->getPost('telefono'),
                    'emp_nit' => $this->request->getPost('nit'), 'emp_logo' => $this->request->getPost('UrldelLogo'), 'emp_estado' => 'A'
                ]

            );
            return redirect()->to(base_url() . "zonasenvio");
        } else {
            $data = ['titulo' => 'Agregar Nueva Empresa', 'validation' => $this->validator];
            echo view('header');
            echo view('zonasenvio/nuevaZonaEnvio', $data);
            echo view('footer');
        }
    }

    public function upShipping(string $idEmpresa, $valid = null)
    {
        $paises = $this->paises->findAll();
        $empresa = $this->zonasenvio->where('emp_id', $idEmpresa)->first();
        if ($valid != null) {
            $data = ['titulo' => 'Editando Empresa', 'datos' => $empresa, 'Paises' => $paises, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editando Cliente', 'datos' => $empresa, 'Paises' => $paises];
        }


        echo view('header');
        echo view('zonasenvio/editarEmpresa', $data);
        echo view('footer');
    }

    public function updateShipping()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->zonasenvio->update(
                $this->request->getPost('codigoEmpresa'),
                [
                    'emp_nombre' => $this->request->getPost('nombre'), 'emp_direccion' => $this->request->getPost('Direccion'), 'emp_telefono' => $this->request->getPost('telefono'),
                    'emp_nit' => $this->request->getPost('nit'), 'emp_logo' => $this->request->getPost('UrldelLogo'), 'emp_estado' => 'A'
                ]
            );
            return redirect()->to(base_url() . "zonasenvio");
        } else {
            return $this->upShipping($this->request->getPost('codigoEmpresa'), $this->validator);
        }
    }

    public function deleteShipping($idCompany)
    {
        $this->zonasenvio->update(
            $idCompany,
            ['emp_estado' => 'E']
        );
        return redirect()->to(base_url() . "zonasenvio");
    }

    public function reEnterShipping($idCompany)
    {
        $this->zonasenvio->update(
            $idCompany,
            ['emp_estado' => 'A']
        );
        return redirect()->to(base_url() . "zonasenvioEliminados");
    }
}
