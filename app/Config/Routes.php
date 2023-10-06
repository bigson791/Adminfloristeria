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

#/Rutas de productos

$routes->get('login', 'Login::index');
