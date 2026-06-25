<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');




$routes->group('admin', ['filter' => 'adminAuth'], function ($routes) {
    $routes->get('/', 'Admin::login');
    $routes->get('login', 'Admin::login');
    $routes->match(['get', 'post'], 'authenticate' , 'Admin::authenticate');
    $routes->get('dashboard' , 'Admin::dashboard');
    $routes->get('blog' , 'BlogController::blog');
    $routes->get('editblog' , 'BlogController::editblog');
    $routes->post('updateblog' , 'BlogController::updateBlog');
    $routes->get('blog/create' , 'BlogController::createBlog');
    $routes->get('logout' , 'Admin::logout');
});

