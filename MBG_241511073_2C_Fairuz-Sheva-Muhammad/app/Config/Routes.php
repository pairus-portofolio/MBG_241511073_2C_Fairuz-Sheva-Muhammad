<?php

namespace Config;

use CodeIgniter\Routing\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');

// Dashboard
$routes->get('/dashboard', 'Dashboard::index');

// Bahan Baku
$routes->get('/bahan', 'BahanBaku::index');
$routes->get('/bahan/create', 'BahanBaku::create');
$routes->post('/bahan/store', 'BahanBaku::store');
$routes->get('/bahan/edit/(:num)', 'BahanBaku::edit/$1');
$routes->post('/bahan/update/(:num)', 'BahanBaku::update/$1');


