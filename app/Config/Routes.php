<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');

$routes->get('blogs', 'Home::bloglist');


$routes->get('blogs/(:segment)', 'Home::singleBlog/$1');


$routes->get('recipes', 'Home::recipeList');

$routes->get('recipes/(:segment)' , 'Home::singleRecipe/$1');




$routes->group('admin', ['filter' => 'adminAuth'], function ($routes) {
    $routes->get('/', 'Admin::login');
    $routes->get('login', 'Admin::login');
    $routes->match(['get', 'post'], 'authenticate', 'Admin::authenticate');
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('blog', 'BlogController::blog');
    $routes->get('editblog', 'BlogController::editblog');
    $routes->post('updateblog', 'BlogController::updateBlog');
    $routes->get('blog/create', 'BlogController::createBlog');
    $routes->post('blog/store', 'BlogController::storeBlog');
    $routes->get('logout', 'Admin::logout');






    // category-----------------------------------------------------------
    $routes->get('category/blog', 'Admin::category');

    $routes->post('category/store', 'Admin::categoryStore');

    $routes->post('category/update', 'Admin::categoryUpdate');

    $routes->get('category/delete/(:num)', 'Admin::categoryDelete/$1');

    $routes->get('category/recipe', 'Admin::recipeCategory');



    // $routes->get('recipecategory/edit/(:num)' , 'Admin::recipecategoryedit/$1');

    $routes->get('recipecategory/delete/(:num)', 'Admin::recipecategorydelete/$1');
    $routes->post('category/recipecatstore', 'Admin::recipecatstore');

    $routes->post('recipecategory/update', 'Admin::recipecategoryupdate');







    // recipe--------------------------------------------------------------------

    $routes->get('recipe', 'Admin::recipe');

    $routes->get('recipe/create', 'Admin::createRecipe');

    $routes->post('recipe/store', 'Admin::storeRecipe');





    // 


});

