<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
#Rutas de clientes
$routes->get('clientes', 'Clientes::index');
$routes->get('NuevoCliente', 'Clientes::newCustumer');
$routes->post('insertarCliente', 'Clientes::insertCustumer');
$routes->get('EditarCliente/(:num)', 'Clientes::upCustumer/$1');
$routes->post('actualizarCliente', 'Clientes::updateCustumer');
$routes->get('eliminarCliente/(:num)', 'Clientes::deleteCustumer/$1');
$routes->get('ClientesEliminados', 'Clientes::seeDeleteCustumer');
$routes->get('reingresarCliente/(:num)', 'Clientes::reEnterCusumer/$1');
#n/rutas de clientes

#Rutas de productos
$routes->get('productos', 'Productos::index');
$routes->get('NuevoProducto', 'Productos::newProduct');
$routes->post('insertarProducto', 'Productos::insertProduct');
$routes->get('EditarProducto/(:num)', 'Productos::upProduct/$1');
$routes->post('actualizarProducto', 'Productos::updateProduct');
$routes->get('eliminarProducto/(:num)','Productos::deleteProduct/$1');
$routes->get('ProductosEliminados', 'Productos::seeDeleteProduct');
$routes->get('reingresarProducto/(:num)', 'Productos::reEnterProduct/$1');
#/Rutas de productos
$routes->get('pedidos', 'Pedidos::index');
$routes->get('nuevoPedido', 'Pedidos::index');
#Rutas de Pedidos

#/Rutas de pedidos

$routes->get('login', 'Login::index');
