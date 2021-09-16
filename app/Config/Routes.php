<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('create-db', function () {
	$forge = \config\Database::forge(); {
		if ($forge->createDatabase('skripsiuhamkatracer')) {
			echo 'Database created!';
		}
	}
});

$routes->get('login', 'Auth::login');

// $routes->addRedirect('/', 'login');

$routes->get('alumni', 'Alumni::index');
$routes->get('alumni/add', 'Alumni::create');
$routes->post('alumni', 'Alumni::store');
$routes->get('alumni/edit/(:any)', 'Alumni::edit/$1');
$routes->put('alumni/(:any)', 'Alumni::update/$1');
$routes->delete('alumni/(:segment)', 'Alumni::destroy/$1');

$routes->post('send-action', 'blas::send_action');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
