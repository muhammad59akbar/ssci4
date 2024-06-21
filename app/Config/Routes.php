<?php


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MyHome::index');
$routes->get('/profile', 'MyHome::ProfileCompany');
$routes->get('/test', 'Test::index');
$routes->get('/MyCorpec/Dashboard', 'Admin\MyCorpec::index');
$routes->get('/MyCorpec/List_Karyawan', 'Admin\MyCorpec::List_Karyawan');
$routes->delete('/MyCorpec/(:num)/DelKrywn', 'Admin\MyCorpec::DKarywanCorp/$1');
$routes->get('/MyCorpec/Add_Karyawan', 'Admin\MyCorpec::NewKaryawan');
$routes->post('/MyCorpec/Create', 'Admin\MyCorpec::AddNewKaryawan');
$routes->get('/MyCorpec/(:num)/edit_karyawan', 'Admin\MyCorpec::Detail_Karyawan/$1');
$routes->post('/MyCorpec/edit_karyawan/(:num)', 'Admin\MyCorpec::EditKaryawan/$1');

$routes->get('/CorpecBlog/ListBlog', 'Admin\CorpecBlog::index');
$routes->get('/CorpecBlog/Write_News', 'Admin\CorpecBlog::WriteNews');
$routes->post('/CorpecBlog/CreateNews', 'Admin\CorpecBlog::AddNews');
