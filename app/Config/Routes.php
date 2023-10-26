<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->get('/', 'Productos::index');
$routes->post('iniciarSesion', 'login::validar');
$routes->get('logout', 'login::logout');


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
$routes->get('eliminarProducto/(:num)', 'Productos::deleteProduct/$1');
$routes->get('ProductosEliminados', 'Productos::seeDeleteProduct');
$routes->get('reingresarProducto/(:num)', 'Productos::reEnterProduct/$1');
#/Rutas de productos


#Rutas de Pedidos
$routes->get('pedidos', 'Pedidos::index');
$routes->get('nuevoPedido/(:num)', 'Pedidos::newOrder/$1');
$routes->post('obtenerZonasEnvio/(:num)', 'Pedidos::ZonasEnvio/$1');
$routes->post('generarPedido', 'Pedidos::generateOrder');
$routes->get('pedidosPendientes', 'Pedidos::pedidosPendientes');
$routes->get('pedidosRuta', 'Pedidos::pedidosEnRuta');
$routes->get('pedidosCompletados', 'Pedidos::pedidosEntregados');
$routes->post('verDetallePedido/(:num)', 'Pedidos::verDetalle/$1');

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
$routes->get('CambiarContrasena', 'usuarios::chPassword');
#/Rutas de Sucursales

#Rutas de Cajas
$routes->get('Cajas', 'Cajas::index');
$routes->get('NuevaCaja', 'Cajas::newBox');
$routes->post('insertarCaja', 'Cajas::insertBox');
$routes->get('EditarCaja/(:num)', 'Cajas::upBox/$1');
$routes->post('actualizarCaja', 'Cajas::updateBox');
$routes->get('eliminarCaja/(:num)', 'Cajas::deleteBox/$1');
$routes->get('CajasEliminadas', 'Cajas::seeDeleteBox');
$routes->get('reingresarCaja/(:num)', 'Cajas::reEnterBox/$1');
#/Rutas de Cajas

#Rutas de Roles
$routes->get('Roles', 'Roles::index');
$routes->get('NuevoRol', 'Roles::newRole');
$routes->post('insertarRol', 'Roles::insertRole');
$routes->get('EditarRol/(:num)', 'Roles::upRole/$1');
$routes->post('actualizarRol', 'Roles::updateRole');
$routes->get('eliminarRol/(:num)', 'Roles::deleteRole/$1');
$routes->get('RolesEliminados', 'Roles::seeDeleteRole');
$routes->get('reingresarRol/(:num)', 'Roles::reEnterRole/$1');
#/Rutas de Roles

#Rutas de Usuarios
$routes->get('usuarios', 'Usuarios::index');
$routes->get('NuevoUsuario', 'Usuarios::newUser');
$routes->post('insertarUsuarios', 'Usuarios::insertUser');
$routes->get('EditarUsuario/(:num)', 'Usuarios::upUser/$1');
$routes->post('actualizarUsuarios', 'Usuarios::updateUser');
$routes->get('eliminarUsuarios/(:num)', 'Usuarios::deleteUser/$1');
$routes->get('UsuariosEliminados', 'Usuarios::seeDeleteUser');
$routes->get('reingresarUsuarios/(:num)', 'Usuarios::reEnterUser/$1');
$routes->post('actualizarContrasena', 'usuarios::changePassword');

#/Rutas de Usuarios

#Rutas de zonas de envio
$routes->get('zonasEnvios', 'ZonasEnvio::index');
$routes->get('nuevaZonaEnvio', 'ZonasEnvio::newShipping');
$routes->post('insertarZonaEnvio', 'ZonasEnvio::insertShipping');
$routes->get('editarZonaEnvio/(:num)', 'ZonasEnvio::upShipping/$1');
$routes->post('actualizarZonaEnvio', 'ZonasEnvio::updateShipping');
$routes->get('eliminarZonaEnvio/(:num)', 'ZonasEnvio::deleteShipping/$1');
$routes->get('zonasEnviosEliminadas', 'ZonasEnvio::seeDeleteShipping');
$routes->get('reingresarZonaEnvio/(:num)', 'ZonasEnvio::reEnterShipping/$1');
$routes->post('obtenerMunicipios/(:num)', 'ZonasEnvio::getMunicipios/$1');


#/Rutas de zonas de envio

$routes->get('login', 'Login::index');
