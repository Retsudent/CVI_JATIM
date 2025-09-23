<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// Home routes
$routes->get('/', 'Home::index');

// Event routes
$routes->group('event', function($routes) {
    $routes->get('/', 'Event::index');
    $routes->get('detail/(:num)', 'Event::detail/$1');
});

// Merchandise routes
$routes->group('merchandise', function($routes) {
    $routes->get('/', 'Merchandise::index');
    $routes->get('detail/(:num)', 'Merchandise::detail/$1');
});

// Campground routes
$routes->group('campground', function($routes) {
    $routes->get('/', 'Campground::index');
    $routes->get('detail/(:num)', 'Campground::detail/$1');
});


// Auth & Admin routes
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::attempt');
$routes->get('logout', 'Auth::logout');

$routes->get('admin', 'Admin::index');

