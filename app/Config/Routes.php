<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('user','UserControler::index');
$routes->post('user/store','UserControler::store');
$routes->post('user/edit','UserControler::edit');