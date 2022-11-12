<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::dashboard');

// $routes->add('/logout', 'Login::logout');
// $routes->get('/dashboard', 'Home::index',['filter' => 'auth']);
$routes->get('/lp', 'Test::index',['filter' => 'login']);
$routes->get('/home', 'Home::index');
$routes->get('/home/about', 'Home::about');

// $routes->group('login', function ($routes) {
//     $routes->get('/', 'Login::index');
//     $routes->add('cek', 'Login::login');
// });

$routes->group('profile', function($routes){
	$routes->get('', 'Profile::getProfile');
	$routes->get('(:segment)/preview', 'Profile::preview/$1');
    $routes->add('create', 'Profile::create');
	$routes->add('(:segment)/edit', 'Profile::edit/$1');
	$routes->post('(:segment)/update', 'Profile::update/$1');
	$routes->get('(:segment)/delete', 'Profile::delete/$1');
});

$routes->group('address', function($routes){
	$routes->get('', 'Address::getAddress');
	$routes->get('(:segment)/preview', 'Address::preview/$1');
    $routes->add('create', 'Address::create');
	$routes->add('(:segment)/edit', 'Address::edit/$1');
	$routes->post('(:segment)/update', 'Address::update/$1');
	$routes->get('(:segment)/delete', 'Address::delete/$1');
});

$routes->group('customer', function($routes){
	$routes->get('', 'Customer::index');
	$routes->get('(:segment)/preview', 'Customer::preview/$1');
    $routes->add('create', 'Customer::create');
	$routes->add('(:segment)/edit', 'Customer::edit/$1');
	$routes->get('(:segment)/delete', 'Customer::delete/$1');
});
$routes->group('package', function($routes){
	$routes->get('', 'Package::index');
	$routes->get('(:segment)/preview', 'Package::preview/$1');
    $routes->add('create', 'Package::create');
	$routes->post('store', 'Package::store');
	$routes->add('(:segment)/edit', 'Package::edit/$1');
	$routes->post('(:segment)/update', 'Package::update/$1');
	$routes->get('(:segment)/delete', 'Package::delete/$1');
});

$routes->group('report', function($routes){
	$routes->get('', 'outlet::index');
	$routes->get('(:segment)/preview', 'outlet::preview/$1');
    $routes->add('create', 'outlet::create');
	$routes->add('(:segment)/edit', 'outlet::edit/$1');
	$routes->get('(:segment)/delete', 'outlet::delete/$1');
});

$routes->group('user', function($routes){
	$routes->get('', 'user::index');
	$routes->get('(:segment)/preview', 'user::preview/$1');
    $routes->add('create', 'user::create');
	$routes->add('(:segment)/edit', 'user::edit/$1');
	$routes->get('(:segment)/delete', 'user::delete/$1');
});

$routes->group('transaction', function($routes){
	$routes->get('', 'transaksi::index');
	$routes->get('konfirmasi', 'transaksi::konfirmasi');
	$routes->get('(:segment)/preview', 'transaksi::preview/$1');
    $routes->add('create', 'transaksi::create');
	$routes->add('(:segment)/edit', 'transaksi::edit/$1');
	$routes->get('(:segment)/delete', 'transaksi::delete/$1');
});


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
