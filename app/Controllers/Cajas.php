<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CajasModel;
use App\Models\EmpresasModelo;
use App\Models\PaisesModelo;

class Cajas extends BaseController
{
    protected $Cajas;
    protected $paises;
    protected $reglas;

    public function __construct()
    {
        $this->Cajas = new CajasModel();
        $this->paises = new PaisesModelo();

        helper(['form']);
        $this->reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'numeroCaja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'folio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ]
        ];
    }
    public function index($activo = 'A')
    {

        $Cajas = $this->Cajas->where('cj_estado', $activo)->findAll();

        $data = ['titulo' => 'Cajas', 'Cajas' => $Cajas];

        echo view('header');
        echo view('cajas/cajas', $data);
        echo view('footer');
    }

    public function seeDeleteBox($activo = 'E')
    {

        $Cajas = $this->Cajas->where('cj_estado', $activo)->findAll();
        $data = ['titulo' => 'Cajas Eliminadas', 'Cajas' => $Cajas];

        echo view('header');
        echo view('cajas/CajasEliminadas', $data);
        echo view('footer');
    }

    public function newBox()
    {
        $data = ['titulo' => 'Agregar Nueva Caja'];

        echo view('header');
        echo view('cajas/nuevaCaja', $data);
        echo view('footer');
    }

    public function insertBox()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->Cajas->save(
                [
                    'cj_nombre' => $this->request->getPost('nombre'), 
                    'cj_num_caja' => $this->request->getPost('numeroCaja'), 
                    'cj_folio' => $this->request->getPost('folio'), 
                    'cj_estado' => 'A'
                ]

            );
            return redirect()->to(base_url() . "cajas");
        } else {
            $data = ['titulo' => 'Agregar Nueva Caja', 'validation' => $this->validator];
            echo view('header');
            echo view('cajas/nuevaCaja', $data);
            echo view('footer');
        }
    }

    public function upBox(string $idCaja, $valid = null)
    {
        $paises = $this->paises->findAll();
        $caja = $this->Cajas->where('cj_id', $idCaja)->first();
        if ($valid != null) {
            $data = ['titulo' => 'Editando Caja', 'datos' => $caja, 'Paises' => $paises, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editando Caja', 'datos' => $caja, 'Paises' => $paises];
        }

        echo view('header');
        echo view('Cajas/editarCaja', $data);
        echo view('footer');
    }

    public function updateBox()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->Cajas->update(
                $this->request->getPost('codigoCaja'),
                [
                    'cj_nombre' => $this->request->getPost('nombre'), 
                    'cj_num_caja' => $this->request->getPost('numeroCaja'), 
                    'cj_folio' => $this->request->getPost('folio'), 
                    'cj_estado' => 'A'
                ]
            );
            return redirect()->to(base_url() . "Cajas");
        } else {
            return $this->upBox($this->request->getPost('codigoCaja'), $this->validator);
        }
    }

    public function deleteBox($idBox)
    {
        $this->Cajas->update(
            $idBox,
            ['cj_estado' => 'E']
        );
        return redirect()->to(base_url() . "Cajas");
    }

    public function reEnterBox($idBox)
    {
        $this->Cajas->update(
            $idBox,
            ['cj_estado' => 'A']
        );
        return redirect()->to(base_url() . "CajasEliminadas");
    }
}
