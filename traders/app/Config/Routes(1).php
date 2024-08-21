<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->get('home/update_users/(:num)', 'Home::update_users/$1');
$routes->post('home/aksi_update_users', 'Home::aksi_update_users');
$route['pengiriman'] = 'home/pengiriman';
$route['update_status_pembayaran'] = 'home/update_status_pembayaran';
$route['history-pesanan'] = 'Home/historyPesanan';

$route['home/print_bk'] = 'home/print_bk';
$routes->get('/signup', 'Home::signup');
$routes->post('/register_user', 'Home::register_user');

$routes->get('/home/update_profile', 'Home::update_profile');
$routes->get('/hslogin', 'Home::riwayat_login');
$routes->get('home/delete_brg/(:num)', 'Home::delete_brg/$1');

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Add your custom route here
$routes->get('login-history', 'LoginHistory::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
