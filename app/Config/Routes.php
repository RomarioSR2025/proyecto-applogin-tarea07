<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');

$routes->get('login', 'AuthController::login');
$routes->post('auth', 'AuthController::auth');

$routes->get('register', 'AuthController::register');
$routes->post('store', 'AuthController::store');

$routes->get('dashboard', 'AuthController::dashboard');
$routes->get('logout', 'AuthController::logout');
