<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModelo;
use App\Models\DepartamentosModelo;
use App\Models\EmpresasModelo;
use App\Models\PedidosDetalleModelo;
use App\Models\PedidosModelo;
use App\Models\ProductoModelo;
use App\Models\SucursalesModelo;
use App\Models\ZonasEnvioModelo;

class Pedidos extends BaseController
{
    protected $pedidos, $empresas, $cliente, $productos, $departamento, $zonaEnvio;
    protected $reglas, $sucursales, $detallePedido;

    public function __construct()
    {
        $this->pedidos = new PedidosModelo();
        $this->empresas = new EmpresasModelo();
        $this->cliente = new ClienteModelo();
        $this->productos = new ProductoModelo();
        $this->departamento = new DepartamentosModelo();
        $this->zonaEnvio = new ZonasEnvioModelo();
        $this->sucursales = new SucursalesModelo();
        $this->detallePedido = new PedidosDetalleModelo();
        helper(['form']);
    }
    public function pedidosPendientes($pendientes = 'P')
    {

        $pedidos = $this->pedidos->where(['pe_estado' => $pendientes])->findAll();
        $data = ['titulo' => 'Pedidos Pendientes de Fabricar', 'pedidos' => $pedidos];

        echo view('header');
        echo view('pedidos/pedidosPendientes', $data);
        echo view('footer');
    }

    public function pedidosEnRuta($enRuta = 'R')
    {

        $pedidos = $this->pedidos->where(['pe_estado' => $enRuta])->findAll();
        $data = ['titulo' => 'Pedidos en Ruta', 'pedidos' => $pedidos];

        echo view('header');
        echo view('pedidos/pedidosEnRuta', $data);
        echo view('footer');
    }


    public function pedidosEntregados($terminados = 'T')
    {

        $pedidos = $this->pedidos->where(['pe_estado' => $terminados])->findAll();
        $data = ['titulo' => 'Pedidos Terminados', 'pedidos' => $pedidos];

        echo view('header');
        echo view('pedidos/pedidosTerminados', $data);
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

        $paramsSucursal = array(
            'suc_estado' => 'A',
            'suc_empresa' => $session->empresa
        );

        $departamentos = $this->departamento->where('dep_estado', 'A')->findAll();
        $cliente = $this->cliente->where($paramsCustumer)->first();
        $empresa = $this->empresas->where($params)->first();
        $productos = $this->productos->where($paramsProducts)->findAll();
        $extras = $this->productos->where($paramsExtras)->findAll();
        $sucursales = $this->sucursales->where($paramsSucursal)->findAll();
        $data = [
            'titulo' => 'Nueva Orden',
            'empresa' => $empresa,
            'cliente' => $cliente,
            'productos' => $productos,
            'extras' => $extras,
            'departamentos' => $departamentos,
            'sucursales' => $sucursales
        ];

        echo view('header');
        echo view('pedidos/NuevoPedido', $data);
        echo view('footer');
    }

    public function generateOrder()
    {
        date_default_timezone_set('America/Guatemala');
        $datosDetalle = $this->request->getVar('detallePedido');
        $encabezado = $this->request->getVar('encabezado');
        $detalles = json_decode($datosDetalle);
        $formData = array();
        parse_str($encabezado, $formData);
        $session = session();

        $db      = \Config\Database::connect();
        $builder = $db->table('fl_ped_enc');
        $builderDetalle = $db->table('fl_ped_detalle');

        try {
            $db->transStart(); // Iniciar la transacción

            // Paso 1: Insertar datos en la tabla "pedidos" (encabezado)
            $encabezadoData = [
                'pe_paginaweb' => $formData['ordenPW'],
                'pe_cl_id' => $formData['codigoPersona'],
                'pe_correlativo' => '',
                'pe_fecha_pedido' => $formData['fechaPedido'],
                'pe_nom_recibe' => $formData['nomRecibe'],
                'pe_fecha_entrega' => $formData['fechaEntrega'],
                'pe_tel_entrega' => $formData['telRecibe'],
                'pe_id_dep_entrega' => $formData['departamentos'],
                'pe_id_mun_entrega' => $formData['municipios'],
                'pe_zona_entrega' => $formData['zonaEntrega'],
                'pe_precio_envio' => $formData['costoEnvio'],
                'pe_dir_entrega' => $formData['dirEntrega'],
                'pe_text_tarjeta' => $formData['leyendatarjeta'],
                'pe_observaciones' => $formData['observaciones'],
                'pe_empresa' => $session->empresa,
                'pe_sucursal' => $formData['fabrica'],
                'pe_forma_pago' => $formData['formaPago'],
                'pe_comprobante_pago' => $formData['comprobante'],
                'pe_estado' => 'P',
                'pe_us_realizo' => $session->id_usuario,
                'pe_creacion' =>  date('Y-m-d H:i')
            ];
            $builder->insert($encabezadoData);

            // Obtener el ID del pedido recién insertado
            $pedido_id = $db->insertID();


            foreach ($detalles as $detalle) {
                $detalleData = [
                    'dt_enc_id' => $pedido_id,
                    'dt_pr_id' => $detalle->codigo,
                    'dt_cantidad' => $detalle->cantidad,
                    'dt_precio' => $detalle->precio
                ];
                $builderDetalle->insert($detalleData);
            }

            $db->transComplete(); // Finalizar la transacción

            if ($db->transStatus() === false) {
                $db->transRollback(); // Deshacer la transacción si falla
            } else {
                $db->transCommit(); // Confirmar la transacción
                echo $pedido_id;
            }
        } catch (\Exception $e) {
            $db->transRollback(); // Deshacer la transacción en caso de excepción
            echo "false";
            //echo "Error en la transacción: " . $e->getMessage();
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

    public function zonasEnvio($idMunicipio)
    {
        $paramMuni = array(
            'env_muni' => $idMunicipio,
            'env_estado' => 'A'
        );

        $zonaEnvio = $this->zonaEnvio->where($paramMuni)->findAll();
        return json_encode($zonaEnvio);
    }

    public function verDetalle($idPedido)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('fl_ped_detalle');
        $builder->select('fl_productos.pr_imagen, fl_productos.pr_nombre, fl_ped_detalle.dt_cantidad')->where('dt_enc_id', $idPedido);
        $builder->join('fl_productos', 'fl_productos.pr_id = fl_ped_detalle.dt_pr_id');
        $query = $builder->get();
        $result = $query->getResult();
        $resultJson = json_encode($result);
        var_dump($resultJson);
    }
}
