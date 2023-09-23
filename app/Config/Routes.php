<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/products', 'ProductsController::Bacay');
$routes->get('/products/(:any)', 'ProductsController::products/$1');
$routes->post('/save', 'ProductsController::save');
$routes->get('/delete/(:any)', 'ProductsController::delete/$1');
$routes->get('/edit/(:any)', 'ProductsController::edit/$1');
$routes->post('/saveCat', 'ProductsController::saveCat');
$routes->get('/deleteCat/(:any)', 'ProductsController::deleteCat/$1');
$routes->get('/editCat/(:any)', 'ProductsController::editCat/$1');

