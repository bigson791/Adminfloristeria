<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CajasModel;
use App\Models\EmpresasModelo;
use App\Models\RolesModel;
use App\Models\SucursalesModelo;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $sucursales;
    protected $empresas;
    protected $usuarios;
    protected $reglas;
    protected $roles, $reglasCambiarPassword;
    protected $cajas;

    public function __construct()
    {
        $this->sucursales = new SucursalesModelo();
        $this->empresas = new EmpresasModelo();
        $this->usuarios = new UsuariosModel();
        $this->roles = new RolesModel();
        $this->cajas = new CajasModel();

        helper(['form']);
        $this->reglas = [
            'usuario' => [
                'rules' => 'required|is_unique[fl_usuarios.us_usuario]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El nombre de usuario {field} ya existe, ingresa uno diferente'
                ],
            ],
            'passwrd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'repasswrd' => [
                'rules' => 'required|matches[passwrd]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'matches' => 'Las contraseñas no coinciden'
                ],
            ],
            'nombres' => [
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
            'rol' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'caja' => [
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

        $this->reglasCambiarPassword = [
            'passwrd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'repasswrd' => [
                'rules' => 'required|matches[passwrd]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'matches' => 'Las contraseñas no coinciden'
                ],
            ],
        ];
    }
    public function index($activo = 'A')
    {

        $usuarios = $this->usuarios->where('us_estado', $activo)->findAll();

        $data = ['titulo' => 'Usuarios Activos', 'usuarios' => $usuarios];

        echo view('header');
        echo view('usuarios/usuarios', $data);
        echo view('footer');
    }

    public function seeDeleteUser($activo = 'E')
    {

        $usuarios = $this->sucursales->where('suc_estado', $activo)->findAll();
        $data = ['titulo' => 'sucursales Eliminadas', 'sucursales' => $usuarios];

        echo view('header');
        echo view('usuarios/UsuariosEliminados', $data);
        echo view('footer');
    }

    public function newUser()
    {
        $Roles = $this->roles->where('rl_estado', 'A')->findAll();
        $Cajas = $this->cajas->where('cj_estado', 'A')->findAll();
        $empresas = $this->empresas->where('emp_estado', 'A')->findAll();
        $data = ['titulo' => 'Agregar Nuevo Usuario', 'empresas' => $empresas, 'Roles' => $Roles, 'Cajas' => $Cajas];

        echo view('header');
        echo view('usuarios/nuevoUsuario', $data);
        echo view('footer');
    }

    public function insertUser()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $hash = password_hash($this->request->getPost('passwrd'), PASSWORD_DEFAULT);
            $this->usuarios->save(
                [
                    'us_nombres' => $this->request->getPost('nombres'),
                    'us_apellidos' => $this->request->getPost('apellidos'),
                    'us_rol' => $this->request->getPost('rol'),
                    'us_id_caja' => $this->request->getPost('caja'),
                    'us_empresa' => intval($this->request->getPost('empresa')),
                    'us_usuario' => $this->request->getPost('usuario'),
                    'us_passwrd' => $hash,
                    'us_estado' => 'A'
                ]
            );
            return redirect()->to(base_url() . "usuarios");
        } else {
            $Roles = $this->roles->where('rl_estado', 'A')->findAll();
            $Cajas = $this->cajas->where('cj_estado', 'A')->findAll();
            $empresas = $this->empresas->where('emp_estado', 'A')->findAll();
            $data = [
                'titulo' => 'Agregar Nueva Empresa',
                'validation' => $this->validator,
                'empresas' => $empresas,
                'Roles' => $Roles,
                'Cajas' => $Cajas
            ];
            echo view('header');
            echo view('usuarios/nuevoUsuario', $data);
            echo view('footer');
        }
    }

    public function upUser($idUser, $valid = null)
    {
        $empresas = $this->empresas->where('emp_estado', 'A')->findAll();
        $Roles = $this->roles->where('rl_estado', 'A')->findAll();
        $Cajas = $this->cajas->where('cj_estado', 'A')->findAll();
        $usuario = $this->usuarios->where('us_id', $idUser)->first();
        if ($valid != null) {
            $data = ['titulo' => 'Editando Usuario', 'empresas' => $empresas, 'Roles' => $Roles, 'Cajas' => $Cajas, 'Usuarios' => $usuario, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editando Usuario', 'Usuarios' => $usuario, 'empresas' => $empresas, 'Roles' => $Roles, 'Cajas' => $Cajas];
        }
        echo view('header');
        echo view('usuarios/editarUsuario', $data);
        echo view('footer');
    }

    public function updateUser()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $hash = password_hash($this->request->getPost('passwrd'), PASSWORD_DEFAULT);
            $this->usuarios->update(
                $this->request->getPost('codigoUsuario'),
                [
                    'us_nombres' => $this->request->getPost('nombres'),
                    'us_apellidos' => $this->request->getPost('apellidos'),
                    'us_rol' => $this->request->getPost('rol'),
                    'us_id_caja' => $this->request->getPost('caja'),
                    'us_empresa' => intval($this->request->getPost('empresa')),
                    'us_passwrd' => $hash,
                    'us_estado' => 'A'
                ]
            );
            return redirect()->to(base_url() . "usuarios");
        } else {
            return $this->upUser($this->request->getPost('codigoUsuario'), $this->validator);
        }
    }

    public function deleteUser($idUser)
    {
        $this->usuarios->update(
            $idUser,
            ['us_estado' => 'E']
        );
        return redirect()->to(base_url() . "usuarios");
    }

    public function reEnterUser($idUser)
    {
        $this->usuarios->update(
            $idUser,
            ['us_estado' => 'A']
        );
        return redirect()->to(base_url() . "usuariosEliminadas");
    }

    public function chPassword()
    {
        $session = session();
        $usuarios = $this->usuarios->where('us_id', $session->id_usuario)->first();

        $data = ['titulo' => 'Actualizar Contraseña', 'usuarios' => $usuarios];

        echo view('header');
        echo view('usuarios/cambiarContrasena', $data);
        echo view('footer');
    }

    public function changePassword()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasCambiarPassword)) {
            $hash = password_hash($this->request->getPost('passwrd'), PASSWORD_DEFAULT);
            $session = session();
            $idUser = $session->id_usuario;
            $this->usuarios->update(
                $idUser,
                [
                    'us_passwrd' => $hash
                ]
            );

            $usuarios = $this->usuarios->where('us_id', $session->id_usuario)->first();
            $data = ['titulo' => 'Actualizar Contraseña', 'usuarios' => $usuarios, 'mensaje' => 'Contraseña cambiada'];

            echo view('header');
            echo view('usuarios/cambiarContrasena', $data);
            echo view('footer');
        } else {
            $session = session();
            $usuarios = $this->usuarios->where('us_id', $session->id_usuario)->first();

            $data = ['titulo' => 'Actualizar Contraseña', 'usuarios' => $usuarios, 'validation' => $this->validator];

            echo view('header');
            echo view('usuarios/cambiarContrasena', $data);
            echo view('footer');
        }
    }
}
