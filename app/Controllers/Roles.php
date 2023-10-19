<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaisesModelo;
use App\Models\RolesModel;

class Roles extends BaseController
{
    protected $Roles;
    protected $paises;
    protected $reglas;

    public function __construct()
    {
        $this->Roles = new RolesModel();
        $this->paises = new PaisesModelo();

        helper(['form']);
        $this->reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ]
        ];
    }
    public function index($activo = 'A')
    {

        $Roles= $this->Roles->where('rl_estado', $activo)->findAll();

        $data = ['titulo' => 'Roles', 'Roles' => $Roles];

        echo view('header');
        echo view('roles/roles', $data);
        echo view('footer');
    }

    public function seeDeleteRole($activo = 'E')
    {

        $Roles= $this->Roles->where('rl_estado', $activo)->findAll();
        $data = ['titulo' => 'Roles Eliminadas', 'Roles' => $Roles];

        echo view('header');
        echo view('roles/RolesEliminados', $data);
        echo view('footer');
    }

    public function newRole()
    {
        $data = ['titulo' => 'Agregar Nuevo Rol'];

        echo view('header');
        echo view('roles/nuevoRol', $data);
        echo view('footer');
    }

    public function insertRole()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->Roles->save(
                [
                    'rl_nombre' => $this->request->getPost('nombre'), 
                    'rl_estado' => 'A'
                ]

            );
            return redirect()->to(base_url() . "Roles");
        } else {
            $data = ['titulo' => 'Agregar Nuevo Rol', 'validation' => $this->validator];
            echo view('header');
            echo view('roles/nuevoRol', $data);
            echo view('footer');
        }
    }

    public function upRole(string $idRol, $valid = null)
    {
        $paises = $this->paises->findAll();
          $rol = $this->Roles->where('rl_id', $idRol)->first();
        if ($valid != null) {
            $data = ['titulo' => 'Editando Caja', 'datos' =>   $rol, 'Paises' => $paises, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editando Caja', 'datos' =>   $rol, 'Paises' => $paises];
        }

        echo view('header');
        echo view('Roles/editarRol', $data);
        echo view('footer');
    }

    public function updateRole()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->Roles->update(
                $this->request->getPost('codigoRol'),
                [
                    'rl_nombre' => $this->request->getPost('nombre')
                ]
            );
            return redirect()->to(base_url() . "Roles");
        } else {
            return $this->upRole($this->request->getPost('codigoRol'), $this->validator);
        }
    }

    public function deleteRole($idRole)
    {
        $this->Roles->update(
            $idRole,
            ['rl_estado' => 'E']
        );
        return redirect()->to(base_url() . "Roles");
    }

    public function reEnterRole($idRole)
    {
        $this->Roles->update(
            $idRole,
            ['rl_estado' => 'A']
        );
        return redirect()->to(base_url() . "RolesEliminados");
    }
}
