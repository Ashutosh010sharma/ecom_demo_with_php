<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->post('/register', 'Home::register');
$routes->get('/login', 'Home::login');
$routes->get('/profile', 'Home::profile');
$routes->post('/profile', 'Home::profile');
$routes->post('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');
$routes->get('/user_dashboard', 'DashboardController::user_dashboard',['filter'=>'isLogin']);

$routes->group('admin',['filter'=>'isAdmin'],static function($routes){
    $routes->get('admin_dashboard', 'AdminDashboardController::index');
    $routes->get('users', 'AdminDashboardController::users');
//Categories

    $routes->get('product_categories', 'ProductCategoriesController::categories');
    $routes->post('product_categories', 'ProductCategoriesController::categories');
});

