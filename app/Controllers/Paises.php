<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaisesModelo;

class Paises extends BaseController
{
    protected $paises;

    public function __construct()
    {
        $this->paises = new PaisesModelo();
    }
    public function index()
    {

        $paises = $this->paises->findAll();

        $data = ['titulo' => 'paises', 'paises' => $paises];

        echo view('header');
        echo view('paises/paises', $data);
        echo view('footer');
    }

    public function seeDeleteCountry($activo = 'E')
    {

        $paises = $this->paises->where('cl_estado', $activo)->findAll();
        $data = ['titulo' => 'paises Eliminados', 'paises' => $paises];

        echo view('header');
        echo view('paises/paisesEliminados', $data);
        echo view('footer');
    }

    public function newCountry()
    {
        $data = ['titulo' => 'Agregar Nuevo País',];

        echo view('header');
        echo view('paises/nuevoCliente', $data);
        echo view('footer');
    }

    public function insertCountry()
    {
        if($this->request->getMethod()== "post" && $this->validate(['nombre'=>'required','apellidos'=>'required', 
        'telefono'=>'required','pais'=>'required', 'empresa'=>'required']))
        {
            $this->paises->save(
                [
                    'cl_nombres' => $this->request->getPost('nombre'), 'cl_apellidos' => $this->request->getPost('apellidos'), 'cl_telefono' => $this->request->getPost('telefono'),
                    'cl_nit' => $this->request->getPost('nit'), 'cl_correo' => $this->request->getPost('correo'),
                    'cl_pais' => $this->request->getPost('pais'), 'fk_empresa' => $this->request->getPost('empresa'), 'cl_estado' => 'A'
                ]
                
            );
            return redirect()->to(base_url() . "paises");
        }else{
            $data = ['titulo' => 'Agregar Nuevo Cliente','validation'=>$this->validator];
            echo view('header');
            echo view('paises/nuevoCliente', $data);
            echo view('footer');
        } 
    }

    public function upCountry(string $idCountry)
    {
        $paises = $this->paises->where('cl_id', $idCountry)->first();
        $data = ['titulo' => 'Editando Cliente', 'datos' => $paises];

        echo view('header');
        echo view('paises/editarCliente', $data);
        echo view('footer');
    }

    public function updateCustumer()
    {
        if($this->request->getMethod()== "post" && $this->validate(['nombre'=>'required','apellidos'=>'required', 
        'telefono'=>'required','pais'=>'required', 'empresa'=>'required']))
        {
            $this->paises->update(
                $this->request->getPost('codigoPersona'),
                [
                    'cl_id' => $this->request->getPost('codigoPersona'), 'cl_nombres' => $this->request->getPost('nombre'), 'cl_apellidos' => $this->request->getPost('apellidos'), 'cl_telefono' => $this->request->getPost('telefono'),
                    'cl_nit' => $this->request->getPost('nit'), 'cl_correo' => $this->request->getPost('correo'),
                    'cl_pais' => $this->request->getPost('pais'), 'fk_empresa' => $this->request->getPost('empresa')
                ]
            );
            return redirect()->to(base_url() . "paises");   
        }else{
            $data = ['titulo' => 'Agregar Nuevo Cliente','validation'=>$this->validator];
            echo view('header');
            echo view('paises/editarCliente', $data);
            echo view('footer');
        }
    }

    public function deleteCustumer($idCliente)
    {
        $this->paises->update(
            $idCliente,
            ['cl_estado' => 'E']
        );
        return redirect()->to(base_url() . "paises");
    }

    public function reEnterCusumer($idCliente)
    {
        $this->paises->update(
            $idCliente,
            ['cl_estado' => 'A']
        );
        return redirect()->to(base_url() . "paisesEliminados");
    }
}
