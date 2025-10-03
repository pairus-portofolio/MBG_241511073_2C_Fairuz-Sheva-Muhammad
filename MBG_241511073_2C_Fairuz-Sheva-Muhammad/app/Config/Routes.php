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
$routes->get('/', 'Auth::login');
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
$routes->get('/bahan/confirm-delete/(:num)', 'BahanBaku::confirmDelete/$1');
$routes->post('/bahan/delete/(:num)', 'BahanBaku::delete/$1');
$routes->post('/bahan/update/(:num)', 'BahanBaku::update/$1');

// Permintaan
$routes->get('/permintaan', 'Permintaan::index');
$routes->get('/permintaan/create', 'Permintaan::create');
$routes->post('/permintaan/store', 'Permintaan::store');

// Detail Permintaan
$routes->get('/permintaan/detail/(:num)', 'Permintaan::detail/$1');

// Persetujuan
// Gudang - Persetujuan Permintaan
$routes->get('/gudang/permintaan', 'Gudang::index');
$routes->get('/gudang/permintaan/detail/(:num)', 'Gudang::detail/$1');
$routes->post('/gudang/permintaan/approve/(:num)', 'Gudang::approve/$1');
$routes->post('/gudang/permintaan/reject/(:num)', 'Gudang::reject/$1');




