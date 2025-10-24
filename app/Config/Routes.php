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
    $routes->get('review/(:num)', 'Merchandise::review/$1');
    $routes->post('review/(:num)', 'Merchandise::review/$1');
});

// Campground routes
$routes->group('campground', function($routes) {
    $routes->get('/', 'Campground::index');
    $routes->get('detail/(:num)', 'Campground::detail/$1');
        // Public review routes for campgrounds (GET show form, POST submit)
        $routes->get('review/(:num)', 'Campground::review/$1');
        $routes->post('review/(:num)', 'Campground::review/$1');
});

// Gallery & Contact routes (handled by controllers)
$routes->get('gallery', 'Gallery::index');
$routes->get('contact', 'Contact::index');
$routes->post('contact', 'Contact::index');
$routes->get('about', 'About::index');


// Auth & Admin routes
$routes->get('login', 'Auth::index');
$routes->post('auth/attempt', 'Auth::attempt');
$routes->get('logout', 'Auth::logout');

// All admin routes are protected by auth filter
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('gallery', 'AdminCrud::indexPhoto');
        // index/listing routes
        $routes->get('events', 'AdminCrud::indexEvents');
        $routes->get('merchandise', 'AdminCrud::indexMerch');
        $routes->get('campground', 'AdminCrud::indexCamp');
        $routes->get('reviews', 'AdminCrud::indexReviews');
            $routes->get('reviews/respond/(:segment)/(:num)', 'AdminCrud::respondReview/$1/$2');
            $routes->post('reviews/respond/(:segment)/(:num)', 'AdminCrud::respondReview/$1/$2');
            $routes->post('reviews/toggle/(:segment)/(:num)', 'AdminCrud::toggleReview/$1/$2');
            $routes->post('reviews/delete/(:segment)/(:num)', 'AdminCrud::deleteReview/$1/$2');
    $routes->get('events/create', 'AdminCrud::createEvent');
    $routes->post('events', 'AdminCrud::storeEvent');
        $routes->get('events/edit/(:segment)', 'AdminCrud::editEvent/$1');
        $routes->post('events/edit/(:segment)', 'AdminCrud::updateEvent/$1');
        $routes->post('events/delete/(:segment)', 'AdminCrud::deleteEvent/$1');
    $routes->get('merchandise/create', 'AdminCrud::createMerch');
    $routes->post('merchandise', 'AdminCrud::storeMerch');
        $routes->get('merchandise/edit/(:segment)', 'AdminCrud::editMerch/$1');
        $routes->post('merchandise/edit/(:segment)', 'AdminCrud::updateMerch/$1');
        $routes->post('merchandise/delete/(:segment)', 'AdminCrud::deleteMerch/$1');

    $routes->get('campground/create', 'AdminCrud::createCamp');
    $routes->post('campground', 'AdminCrud::storeCamp');
        $routes->get('campground/edit/(:segment)', 'AdminCrud::editCamp/$1');
        $routes->post('campground/edit/(:segment)', 'AdminCrud::updateCamp/$1');
        $routes->post('campground/delete/(:segment)', 'AdminCrud::deleteCamp/$1');

    $routes->get('gallery/create', 'AdminCrud::createPhoto');
    $routes->post('gallery', 'AdminCrud::storePhoto');
        $routes->get('gallery/edit/(:segment)', 'AdminCrud::editPhoto/$1');
        $routes->post('gallery/edit/(:segment)', 'AdminCrud::updatePhoto/$1');
        $routes->post('gallery/delete/(:segment)', 'AdminCrud::deletePhoto/$1');
    // Fallback direct-view route if controller not matched
    $routes->get('gallery/create', static function() {
        // Use global view helper explicitly to avoid namespaced resolution (Config\view)
        return \view('admin/gallery/create');
    });
});

// Asset proxy for images (works even if webroot not pointing to /public)
$routes->get('images/(:any)', 'Assets::image/$1');

// Debug route (only in development)
if (ENVIRONMENT === 'development') {
    $routes->get('debug/events', 'Debug::events');
    // Echo endpoint useful for debugging incoming POSTs (headers/body)
    $routes->post('debug/echo', 'Debug::echoPost');
    $routes->post('debug/echo/(:segment)', 'Debug::echoPost/$1');
}
