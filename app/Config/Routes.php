<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/daftarbuku', 'Home::buku');
$routes->get('/login', 'login::index');
$routes->get('/register', 'register::index');
$routes->post('/register/process', 'register::process');
$routes->get('/dataBuku', 'crudBuku::index');
$routes->group('dashboard', ['filter' => 'AdminAuth'], function($routes){
  $routes->get('/', 'dashboard::index');
});
$routes->get('/buku/(:segment)', 'DetailBuku::index/$1'); 

