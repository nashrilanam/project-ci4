<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/valid_login', 'Auth::valid_login');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/valid_register', 'Auth::valid_register');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/user', 'User::dashboard');
$routes->get('/admin', 'Admin::index');

$routes->get('/user/bencana/lihat', 'User::lihat');

$routes->get('/user/bencana/new', 'User::new');

$routes->get('/', 'Home::index');

$routes->get('/admin/tambah/bencana', 'Admin::tambah_bencana');

$routes->post('/bencana/save', 'Bencana::save');

$routes->post('/bencana/admin/save', 'Bencana::saveadmin');

$routes->delete('/bencana/(:num)', 'Bencana::delete/$1');
$routes->get('/bencana/edit/(:num)', 'Bencana::edit/$1'); 
$routes->post('/bencana/update/(:num)', 'Bencana::update/$1');