<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Login::index');
$routes->post('login/autenticar', 'Login::autenticar');

// 1. Ruta de respaldo para evitar el error 404 que tenías antes
$routes->get('login/autenticar', 'Login::index');