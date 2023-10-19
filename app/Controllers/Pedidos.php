<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PedidosModel;
use App\Models\ProductoModelo;

class pedidos extends BaseController
{
    protected $pedidos;
    protected $reglas;

    public function __construct()
    {
        $this->pedidos = new PedidosModel();

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

        $pedidos = $this->pedidos->where('pr_estado', $activo)->findAll();
        $data = ['titulo' => 'pedidos Eliminados', 'pedidos' => $pedidos];

        echo view('header');
        echo view('pedidos/pedidosEliminados', $data);
        echo view('footer');
    }

    public function newProduct()
    {
        $data = ['titulo' => 'Agregar Nuevo Producto',];

        echo view('header');
        echo view('pedidos/NuevoProducto', $data);
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

            $data = ['titulo' => 'Agregar Nuevo Producto','validation' => $this->validator];

            echo view('header');
            echo view('pedidos/NuevoProducto', $data);
            echo view('footer');
        }
    }

    public function upProduct(string $idPedido, $valid = null)
    {
        $producto = $this->pedidos->where('pr_id', $idPedido)->first();
        if($valid!=null){
            $data = ['titulo' => 'Editando Producto', 'datos' => $producto,'validation'=>$valid];
        }else{
            $data = ['titulo' => 'Editando Producto', 'datos' => $producto];
        }
        

        echo view('header');
        echo view('pedidos/editarProducto', $data);
        echo view('footer');
    }


    public function updateProduct()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->pedidos->update(
                $this->request->getPost('codigoProducto'),
                [
                    'pr_id' => $this->request->getPost('codigoProducto'), 'pr_nombre' => $this->request->getPost('nombreProducto'),
                    'pr_descripcion' => $this->request->getPost('descripcionProducto'), 'pr_precio_normal' => $this->request->getPost('precioNormal'),
                    'pr_precio_rebajado' => $this->request->getPost('precioRebajado'), 'pr_imagen' => $this->request->getPost('urlImgProd'),
                    'pr_empresa' => $this->request->getPost('empresa'), 'pr_estado' => 'A'
                ]
            );
            return redirect()->to(base_url() . "pedidos");
        } else {
            return $this->upProduct($this->request->getPost('codigoProducto'), $this->validator);
        }
    }

    public function deleteProduct($idPedido)
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
