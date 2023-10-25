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
            'departamentos' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'municipios' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'zona' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'costoEnvio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'nomZona' => [
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
        echo view('zonasenvio/zonasEnvios', $data);
        echo view('footer');
    }

    public function seeDeleteShipping($activo = 'E')
    {

        $zonasenvio = $this->zonasenvio->where('env_estado', $activo)->findAll();
        $data = ['titulo' => 'Zonas Envío Eliminadas', 'zonasenvio' => $zonasenvio];

        echo view('header');
        echo view('zonasenvio/zonasEnviosEliminadas', $data);
        echo view('footer');
    }

    public function newShipping()
    {
        $departamentos = $this->departamentos->where('dep_estado', 'A')->findAll();
        $data = ['titulo' => 'Agregar Nueva ZonaEnvio', 'departamentos' => $departamentos];

        echo view('header');
        echo view('zonasenvio/nuevaZonaEnvio', $data);
        echo view('footer');
    }

    public function insertShipping()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->zonasenvio->save(
                [
                    'env_muni' => $this->request->getPost('municipios'),
                    'env_dep' => $this->request->getPost('departamentos'),
                    'env_nombre' => $this->request->getPost('nomZona'),
                    'env_precio' => $this->request->getPost('costoEnvio'),
                    'env_zona' => $this->request->getPost('zona'),
                    'env_ruta' => $this->request->getPost('ruta'),
                    'env_estado' => 'A'
                ]

            );
            return redirect()->to(base_url() . "zonasEnvios");
        } else {

            $departamentos = $this->departamentos->where('dep_estado', 'A')->findAll();
            $data = ['titulo' => 'Agregar Nueva Zona Envío', 'validation' => $this->validator, 'departamentos' => $departamentos];
            echo view('header');
            echo view('zonasenvio/nuevaZonaEnvio', $data);
            echo view('footer');
        }
    }

    public function upShipping(string $idZona, $valid = null)
    {
        $zonaenvio = $this->zonasenvio->where('env_id', $idZona)->first();
        $departamentos = $this->departamentos->findAll();
        $paramMuni = array(
            'dep_id' => $zonaenvio['env_dep'],
            'mun_estado' => 'A'
        );

        $municipios = $this->municipios->where($paramMuni)->findAll();
        if ($valid != null) {
            $data = ['titulo' => 'Editando Zona Envio', 'departamentos' => $departamentos, 'municipios' => $municipios, 'data' => $zonaenvio, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editando Zona Envio', 'departamentos' => $departamentos, 'municipios' => $municipios, 'data' => $zonaenvio];
        }


        echo view('header');
        echo view('zonasenvio/editarZonaEnvio', $data);
        echo view('footer');
    }

    public function updateShipping()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->zonasenvio->update(
                $this->request->getPost('codigoZona'),
                [
                    'env_muni' => $this->request->getPost('municipios'),
                    'env_dep' => $this->request->getPost('departamentos'),
                    'env_nombre' => $this->request->getPost('nomZona'),
                    'env_precio' => $this->request->getPost('costoEnvio'),
                    'env_zona' => $this->request->getPost('zona'),
                    'env_ruta' => $this->request->getPost('ruta'),
                    'env_estado' => 'A'
                ]
            );
            return redirect()->to(base_url() . "zonasEnvios");
        } else {
            return $this->upShipping($this->request->getPost('codigoZona'), $this->validator);
        }
    }

    public function deleteShipping($idCompany)
    {
        $this->zonasenvio->update(
            $idCompany,
            ['env_estado' => 'E']
        );
        return redirect()->to(base_url() . "zonasEnvios");
    }

    public function reEnterShipping($idShipping)
    {
        $this->zonasenvio->update(
            $idShipping,
            ['env_estado' => 'A']
        );
        return redirect()->to(base_url() . "zonasEnviosEliminadas");
    }

    public function getMunicipios($idDepto)
    {
        $paramMuni = array(
            'dep_id' => $idDepto,
            'mun_estado' => 'A'
        );

        $municipios = $this->municipios->where($paramMuni)->findAll();

        return json_encode($municipios);
    }
}
