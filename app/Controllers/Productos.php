<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductoModelo;

class Productos extends BaseController
{
    protected $productos;
    public function __construct()
    {
        $this->productos = new ProductoModelo(); 
    }
public function index($activo = 'A'){

    $productos = $this->productos->where(['pr_estado' => $activo])->findAll();
    $data = ['titulo'=>'Productos','productos'=>$productos];

    echo view('header');
    echo view('productos/productos', $data);
    echo view('footer');

}


public function seeDeleteProduct($activo = 'E'){

    $productos = $this->productos->where('pr_estado', $activo)->findAll();
    $data = ['titulo'=>'Productos Eliminados','productos'=>$productos];

    echo view('header');
    echo view('productos/productosEliminados',$data);
    echo view('footer');

}

public function newProduct(){
    $data = ['titulo'=>'Agregar Nuevo Producto',];

    echo view('header');
    echo view('productos/NuevoProducto',$data);
    echo view('footer');
}

public function insertProduct(){
    $this->productos->save(['pr_nombre' => $this->request->getPost('nombreProducto'), 'pr_descripcion' => $this->request->getPost('descripcionProducto'),
    'pr_precio_normal' => $this->request->getPost('precioNormal'), 'pr_precio_rebajado' => $this->request->getPost('precioRebajado'),
    'pr_imagen' => $this->request->getPost('urlImgProd'),'pr_empresa' => $this->request->getPost('empresa'), 
    'pr_estado' => 'A'] 
);
return redirect()->to(base_url()."productos");
                                                        
}

public function upProduct(string $idProducto){
    $producto = $this->productos->where('pr_id', $idProducto)->first();
    $data = ['titulo'=>'Editando Producto', 'datos'=> $producto];
    
    echo view('header');
    echo view('productos/editarProducto',$data);
    echo view('footer');

}


public function updateProduct()
{
    $this->productos->update($this->request->getPost('codigoProducto'),['pr_id' => $this->request->getPost('codigoProducto'),'pr_nombre' => $this->request->getPost('nombreProducto'),
    'pr_descripcion' => $this->request->getPost('descripcionProducto'),'pr_precio_normal' => $this->request->getPost('precioNormal'),
    'pr_precio_rebajado' => $this->request->getPost('precioRebajado'), 'pr_imagen' => $this->request->getPost('urlImgProd'),
    'pr_empresa' => $this->request->getPost('empresa'), 'pr_estado' => 'A'] 
);
return redirect()->to(base_url()."productos");
}

public function deleteProduct($idProducto)
{
    $this->productos->update($idProducto,['pr_estado' => 'E'] 
);
return redirect()->to(base_url()."productos");
}

public function reEnterProduct($idProducto)
{
    $this->productos->update($idProducto,['pr_estado' => 'A'] 
);
return redirect()->to(base_url()."ProductosEliminados");
}





// public function newCustumer(){
//     $data = ['titulo'=>'Agregar Nuevo Cliente',];

//     echo view('header');
//     echo view('clientes/nuevoCliente',$data);
//     echo view('footer');

// }

// public function insertCustumer()
// {
//     $this->clientes->save(['cl_nombres' => $this->request->getPost('nombre'), 'cl_apellidos' => $this->request->getPost('apellidos'),'cl_telefono' => $this->request->getPost('telefono'),
//     'cl_nit' => $this->request->getPost('nit'), 'cl_correo' => $this->request->getPost('correo'),
//     'cl_pais' => $this->request->getPost('pais'), 'fk_empresa' => $this->request->getPost('empresa'), 'cl_estado' => 'A'] 
// );
// return redirect()->to(base_url()."clientes");
// }



// public function deleteCustumer($idCliente)
// {
//     $this->clientes->update($idCliente,['cl_estado' => 'E'] 
// );
// return redirect()->to(base_url()."clientes");
// }




}
