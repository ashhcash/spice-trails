<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes ->get('registration' , 'Home::registration');
$routes->get('admin', 'Admin::login');
$routes->get('admin/login' , 'Admin::adminLogin');
