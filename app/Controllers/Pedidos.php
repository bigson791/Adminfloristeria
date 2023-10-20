<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModelo;
use App\Models\EmpresasModelo;
use App\Models\PedidosModel;
use App\Models\PedidosModelo;
use App\Models\ProductoModelo;

class pedidos extends BaseController
{
    protected $pedidos, $empresas, $cliente, $productos;
    protected $reglas;

    public function __construct()
    {
        $this->pedidos = new PedidosModelo();
        $this->empresas = new EmpresasModelo();
        $this->cliente = new ClienteModelo();
        $this->productos = new ProductoModelo();


        helper(['form']);
    }
    public function index($activo = 'A')
    {

        $pedidos = $this->pedidos->where(['pr_estado' => $activo])->findAll();
        $data = ['titulo' => 'pedidos', 'pedidos' => $pedidos];

        echo view('header');
        echo view('pedidos/pedidos', $data);
        echo view('footer');
    }


    public function seeDeleteProduct($activo = 'E')
    {

        $pedidos = $this->pedidos->where('pe_estado', $activo)->findAll();
        $data = ['titulo' => 'pedidos Eliminados', 'pedidos' => $pedidos];

        echo view('header');
        echo view('pedidos/pedidosEliminados', $data);
        echo view('footer');
    }

    public function newOrder($idCliente)
    {
        $session = session();

        $params = array(
            'emp_estado' => 'A',
            'emp_id' => $session->empresa
        );

        $paramsCustumer = array(
            'cl_estado' => 'A',
            'cl_id' => $idCliente
        );

        $paramsProducts = array(
            'pr_estado' => 'A',
            'pr_categoria' => '1',
            'pr_empresa' => $session->empresa
        );

        $paramsExtras = array(
            'pr_estado' => 'A',
            'pr_categoria' => '2',
            'pr_empresa' => $session->empresa
        );


        $cliente = $this->cliente->where($paramsCustumer)->first();
        $empresa = $this->empresas->where($params)->first();
        $productos = $this->productos->where($paramsProducts)->findAll();
        $extras = $this->productos->where($paramsExtras)->findAll();
        $data = [
            'titulo' => 'Nueva Orden',
            'empresa' => $empresa,
            'cliente' => $cliente,
            'productos' => $productos,
            'extras' => $extras
        ];

        echo view('header');
        echo view('pedidos/NuevoPedido', $data);
        echo view('footer');
    }

    public function insertProduct()
    {
        if ($this->request->getMethod() == 'post' && $this->validate($this->reglas)) {
            $this->pedidos->save(
                [
                    'pr_nombre' => $this->request->getPost('nombreProducto'), 'pr_descripcion' => $this->request->getPost('descripcionProducto'),
                    'pr_precio_normal' => $this->request->getPost('precioNormal'), 'pr_precio_rebajado' => $this->request->getPost('precioRebajado'),
                    'pr_imagen' => $this->request->getPost('urlImgProd'), 'pr_empresa' => $this->request->getPost('empresa'),
                    'pr_estado' => 'A'
                ]
            );
            return redirect()->to(base_url() . "pedidos");
        } else {

            $data = ['titulo' => 'Agregar Nuevo Producto', 'validation' => $this->validator];

            echo view('header');
            echo view('pedidos/NuevoProducto', $data);
            echo view('footer');
        }
    }

    public function upOrder(string $idPedido, $valid = null)
    {
        $producto = $this->pedidos->where('pr_id', $idPedido)->first();
        if ($valid != null) {
            $data = ['titulo' => 'Editando Producto', 'datos' => $producto, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editando Producto', 'datos' => $producto];
        }


        echo view('header');
        echo view('pedidos/editarProducto', $data);
        echo view('footer');
    }


    public function updateOrder()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->pedidos->update(
                $this->request->getPost('codigoProducto'),
                [
                    'pr_id' => $this->request->getPost('codigoProducto'), 'pr_nombre' => $this->request->getPost('nombreProducto'),
                    'pr_descripcion' => $this->request->getPost('descripcionProducto'), 'pr_precio_normal' => $this->request->getPost('precioNormal'),
                    'pr_precio_rebajado' => $this->request->getPost('precioRebajado'), 'pr_imagen' => $this->request->getPost('urlImgProd'),
                    'pr_empresa' => $this->request->getPost('empresa'), 'pe_estado' => 'A'
                ]
            );
            return redirect()->to(base_url() . "pedidos");
        } else {
            return $this->upOrder($this->request->getPost('codigoProducto'), $this->validator);
        }
    }

    public function deleteOrder($idPedido)
    {
        $this->pedidos->update(
            $idPedido,
            ['pr_estado' => 'E']
        );
        return redirect()->to(base_url() . "pedidos");
    }

    public function reEnterProduct($idPedido)
    {
        $this->pedidos->update(
            $idPedido,
            ['pr_estado' => 'A']
        );
        return redirect()->to(base_url() . "pedidosEliminados");
    }
}
