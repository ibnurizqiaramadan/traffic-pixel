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
$routes->get('/', 'Home::index');
$routes->get('scan', 'Home::scan');
$routes->get('info', 'Home::info');
$routes->get('scan-v2', 'Home::scan2');
$routes->get('login', 'Login::index');
$routes->get('login/action', 'Login::action');
$routes->get('login/destroy', 'Login::destroy');
$routes->get('register', 'Register::index');

$routes->group('client', ['namespace' => 'App\Controllers\Client'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('scan', 'Scan::index');
});

$routes->group('ruangadmin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('dashboard', 'Dashboard::index');

    // user profile routes
    $routes->group('profile', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
        $routes->get('/', 'Profile::index');
        $routes->post('update', 'Profile::update');
        $routes->post('delete', 'Profile::delete');
        $routes->post('set-password', 'Profile::setPassword');
        $routes->post('socials-delete', 'Profile::socialsDelete');
        $routes->post('socials-store', 'Profile::socialsStore');
        $routes->post('socials-update', 'Profile::socialsUpdate');
        $routes->post('preview-web', 'Profile::previewWeb');
        $routes->post('get-web', 'Profile::getWeb');
        $routes->post('save-web', 'Profile::saveWeb');
    });

    // User Management routes
    $routes->group('users', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
        $routes->get('/', 'Users::index');
        $routes->post('store', 'Users::store');
        $routes->post('delete', 'Users::delete');
        $routes->post('update', 'Users::update');
        $routes->post('reset/(:any)', 'Users::reset_/$1');
        $routes->post('set/(:any)', 'Users::set_/$1');
        $routes->post('delete-multiple', 'Users::deleteMultiple');
        $routes->post('reset-multiple', 'Users::resetMultiple');
        $routes->post('set-multiple', 'Users::setMultiple');
    });
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
