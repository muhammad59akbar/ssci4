<?php


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MyHome::index');
$routes->get('/test', 'Test::index');
$routes->get('/MyCorpec/Dashboard', 'Admin\MyCorpec::index');
