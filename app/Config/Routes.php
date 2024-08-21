<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');  // This sets the root URL to the login page

$routes->get('/login', 'Auth::login');
$routes->post('/auth/do_login', 'Auth::do_login');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/do_register', 'Auth::do_register');
$routes->get('/logout', 'Auth::logout');
$routes->get('/admin_home', 'AdminHome::index'); // Update with your admin home Home
$routes->get('/petugas_home', 'PetugasHome::index'); // Update with your petugas home Home


$routes->get('/koneksi', 'Koneksi::index'); // Rute untuk home Koneksi



$routes->get('/datasiswa', 'Datasiswa::index');
$routes->post('/datasiswa/create', 'Datasiswa::create');
$routes->post('/datasiswa/update', 'Datasiswa::update');
$routes->post('/datasiswa/delete', 'Datasiswa::delete');
$routes->get('/datasiswa/get_by_nisn', 'Datasiswa::get_by_nisn');


$routes->get('/datapetugas', 'Datapetugas::index');
$routes->get('/datapetugas/get_by_id', 'Datapetugas::get_by_id');
$routes->post('/datapetugas/create', 'Datapetugas::create');
$routes->post('/datapetugas/update', 'Datapetugas::update');
$routes->post('/datapetugas/delete', 'Datapetugas::delete');


// Route untuk Data Kelas
$routes->get('/datakelas', 'Datakelas::index');
$routes->post('/datakelas/create', 'Datakelas::create');
$routes->post('/datakelas/update', 'Datakelas::update');
$routes->post('/datakelas/delete', 'Datakelas::delete');
$routes->get('/datakelas/get_by_id', 'Datakelas::get_by_id');

//Route Untuk Data SPP
$routes->get('/dataspp', 'Dataspp::index');
$routes->post('/dataspp/create', 'Dataspp::create');
$routes->post('/dataspp/update', 'Dataspp::update');
$routes->post('/dataspp/delete', 'Dataspp::delete');
$routes->get('/dataspp/get_by_id', 'Dataspp::get_by_id');

// Routes for Pembayaran
$routes->get('pembayaran', 'Pembayaran::index');
$routes->get('pembayaran/create', 'Pembayaran::create');
$routes->post('pembayaran/store', 'Pembayaran::store');
$routes->get('pembayaran/edit/(:num)', 'Pembayaran::edit/$1');
$routes->post('pembayaran/update', 'Pembayaran::update');
$routes->get('pembayaran/delete/(:num)', 'Pembayaran::delete/$1');



$routes->get('/datasiswa_view', 'DatasiswaView::index');
$routes->get('history_pembayaran', 'HistoryPembayaran::index');





