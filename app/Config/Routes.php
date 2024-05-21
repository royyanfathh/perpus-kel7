<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/daftarbuku', 'Home::buku');
$routes->get('/dashboard', 'dashboard::index');
$routes->get('/login', 'login::index');
$routes->get('/register', 'register::index');
$routes->post('/register/process', 'register::process');
$routes->get('/dataBuku', 'Home::crudBuku');