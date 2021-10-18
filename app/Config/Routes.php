<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Vehiculos::index');

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

//marcas
$routes->group('marcas', [], function($routes){
    $routes->get('', 'Marcas::index');
    $routes->get('create', 'Marcas::create');
    $routes->get('store', 'Marcas::store');
    $routes->get('edit/(:num)', 'Marcas::edit/$1');
    $routes->get('update/(:num)', 'Marcas::update/$1');
    $routes->get('destroy/(:num)', 'Marcas::destroy/$1');
});

//modelos
$routes->group('modelos', [], function($routes){
    $routes->get('', 'Modelos::index');
    $routes->get('create', 'Modelos::create');
    $routes->get('store', 'Modelos::store');
    $routes->get('edit/(:num)', 'Modelos::edit/$1');
    $routes->get('update/(:num)', 'Modelos::update/$1');
    $routes->get('destroy/(:num)', 'Modelos::destroy/$1');
});


//tipos
$routes->group('tipos',[], function($routes){
    $routes->get('', 'Tipos::index');
    $routes->get('create', 'Tipos::create');
    $routes->get('store', 'Tipos::store');
    $routes->get('edit/(:num)', 'Tipos::edit/$1');
    $routes->get('update/(:num)', 'Tipos::update/$1');
    $routes->get('destroy/(:num)', 'Tipos::destroy/$1');
});


//colores}
$routes->group('colores', [], function($routes){
    $routes->get('', 'Colores::index');
    $routes->get('create', 'Colores::create');
    $routes->get('store', 'Colores::store');
    $routes->get('edit/(:num)', 'Colores::edit/$1');
    $routes->get('update/(:num)', 'Colores::update/$1');
    $routes->get('destroy/(:num)', 'Colores::destroy/$1');
});


//vehiculos
$routes->group('vehiculos', [], function($routes){
    $routes->get('', 'Vehiculos::index');
    $routes->get('create', 'Vehiculos::create');
    $routes->get('store', 'Vehiculos::store');
    $routes->get('edit/(:num)', 'Vehiculos::edit/$1');
    $routes->get('update/(:num)', 'Vehiculos::update/$1');
    $routes->get('destroy/(:num)', 'Vehiculos::destroy/$1');
});