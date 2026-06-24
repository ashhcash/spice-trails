<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('registration', 'Home::registration');



$routes->group('admin', ['filter' => 'adminAuth'], function ($routes) {
    $routes->get('/', 'Admin::login');
    $routes->get('login', 'Admin::login');
    $routes->match(['get', 'post'], 'authenticate' , 'Admin::authenticate');
    $routes->get('dashboard' , 'Admin::dashboard');
});

