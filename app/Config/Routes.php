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

#Rutas de Empresas
$routes->get('empresas', 'Empresas::index');
$routes->get('NuevaEmpresa', 'Empresas::newCompany');
$routes->post('insertarEmpresa', 'Empresas::insertCompany');
$routes->get('EditarEmpresa/(:num)', 'Empresas::upCompany/$1');
$routes->post('actualizarEmpresa', 'Empresas::updateCompany');
$routes->get('eliminarEmpresa/(:num)', 'Empresas::deleteCompany/$1');
$routes->get('EmpresasEliminados', 'Empresas::seeDeleteCompany');
$routes->get('reingresarEmpresa/(:num)', 'Empresas::reEnterCompany/$1');
#/Rutas de Empresas

#Rutas de Sucursales
$routes->get('sucursales', 'Sucursales::index');
$routes->get('NuevaSucursal', 'Sucursales::newBranch');
$routes->post('insertarSucursal', 'Sucursales::insertBranch');
$routes->get('EditarSucursal/(:num)', 'Sucursales::upBranch/$1');
$routes->post('actualizarSucursal', 'Sucursales::updateBranch');
$routes->get('eliminarSucursal/(:num)', 'Sucursales::deleteBranch/$1');
$routes->get('SucursalesEliminadas', 'Sucursales::seeDeleteBranch');
$routes->get('reingresarSucursal/(:num)', 'Sucursales::reEnterBranch/$1');
#/Rutas de Sucursales

#Rutas de Cajas
#/Rutas de Cajas

#Rutas de Roles
#/Rutas de Roles

#Rutas de Usuarios
$routes->get('usuarios', 'Usuarios::index');
$routes->get('NuevoUsuarios', 'Usuarios::newUser');
$routes->post('insertarUsuarios', 'Usuarios::insertUser');
$routes->get('EditarUsuarios/(:num)', 'Usuarios::upUser/$1');
$routes->post('actualizarUsuarios', 'Usuarios::updateUser');
$routes->get('eliminarUsuarios/(:num)', 'Usuarios::deleteUser/$1');
$routes->get('UsuariosEliminados', 'Usuarios::seeDeleteUser');
$routes->get('reingresarUsuarios/(:num)', 'Usuarios::reEnterUser/$1');
#/Rutas de Usuarios

$routes->get('login', 'Login::index');
