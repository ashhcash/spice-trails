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
    $routes->post('blog/store' , 'BlogController::storeBlog');
    $routes->get('logout' , 'Admin::logout');
    $routes->get('category' , 'Admin::category');

    $routes->post('category/store' , 'Admin::categoryStore');

    $routes->get('category/delete/(:num)' , 'Admin::categoryDelete/$1');
});

