<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/products', 'ProductsController::Bacay');
$routes->get('/products/(:any)', 'ProductsController::products/$1');
