<?php


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MyHome::index');
$routes->get('/profile', 'MyHome::ProfileCompany');
$routes->get('/partnership', 'MyHome::PartnerShip');
$routes->get('/(:segment)/detail', 'MyHome::detailNewsCompany/$1');
$routes->get('/category/(:segment)', 'MyHome::category/$1');



$routes->get('/MyCorpec/Dashboard', 'Admin\MyCorpec::index');
$routes->get('/MyCorpec/Profile', 'Admin\MyCorpec::Profile');
$routes->get('/MyCorpec/List_Karyawan', 'Admin\MyCorpec::List_Karyawan');
$routes->delete('/MyCorpec/(:num)/DelKrywn', 'Admin\MyCorpec::DKarywanCorp/$1');
$routes->get('/MyCorpec/Add_Karyawan', 'Admin\MyCorpec::NewKaryawan');
$routes->post('/MyCorpec/Create', 'Admin\MyCorpec::AddNewKaryawan');
$routes->get('/MyCorpec/(:num)/edit_karyawan', 'Admin\MyCorpec::Detail_Karyawan/$1');
$routes->post('/MyCorpec/edit_karyawan/(:num)', 'Admin\MyCorpec::EditKaryawan/$1');

$routes->get('/CorpecBlog/ListBlog', 'Admin\CorpecBlog::index');
$routes->get('/CorpecBlog/Write_News', 'Admin\CorpecBlog::WriteNews');
$routes->post('/CorpecBlog/CreateNews', 'Admin\CorpecBlog::AddNews');
$routes->get('/CorpecBlog/(:segment)/Detail_News', 'Admin\CorpecBlog::detailNews/$1');
$routes->post('/CorpecBlog/updateNews/(:num)', 'Admin\CorpecBlog::updateNews/$1');
$routes->delete('/CorpecBlog/Delete_News/(:num)', 'Admin\CorpecBlog::destroyNews/$1');

$routes->get('/CorpecBlog/Partnership', 'Admin\CorpecBlog::ListPartnerShip');
$routes->post('/CorpecBlog/addPartnership', 'Admin\CorpecBlog::AddPartnership');
$routes->post('/CorpecBlog/EditPartnership/(:any)', 'Admin\CorpecBlog::EditPartner/$1');
$routes->delete('/CorpecBlog/DeletePartner/(:any)', 'Admin\CorpecBlog::destroyPartner/$1');

$routes->get('/MyCorp/presence', 'Admin\PresenceController::index');
$routes->get('/MyCorp/presence/create', 'Admin\PresenceController::create');
$routes->post('/MyCorp/presence/store', 'Admin\PresenceController::store');
$routes->get('/MyCorp/presence/(:num)/edit', 'Admin\PresenceController::edit/$1');
$routes->post('/MyCorp/presence/(:num)', 'Admin\PresenceController::update/$1');
$routes->delete('/MyCorp/presence/(:num)/delete', 'Admin\PresenceController::destroy/$1');

$routes->get('/MyCorp/attendance', 'AttendanceController::index');
$routes->get('/MyCorp/attendance/create', 'AttendanceController::create');
$routes->post('/MyCorp/attendance/store', 'AttendanceController::store');
$routes->get('/MyCorp/attendance/in', 'AttendanceController::masuk');
$routes->get('/MyCorp/attendance/late', 'AttendanceController::terlambat');
$routes->get('/MyCorp/attendance/alpha', 'AttendanceController::alpha');

$routes->get('/MyCorp/salary', 'Admin\SalaryController::index');
$routes->get('/MyCorp/salary/create', 'Admin\SalaryController::create');
$routes->post('/MyCorp/salary/store', 'Admin\SalaryController::store');
$routes->get('/MyCorp/salary/(:num)/detail', 'Admin\SalaryController::show/$1');
$routes->get('/MyCorp/salary/(:num)/edit', 'Admin\SalaryController::edit/$1');
$routes->get('/MyCorp/salary/getSalaryAndDeduction/(:num)', 'Admin\SalaryController::getSalaryAndDeduction/$1');
$routes->post('/MyCorp/salary/(:num)', 'Admin\SalaryController::update/$1');
$routes->delete('/MyCorp/salary/(:num)/delete', 'Admin\SalaryController::destroy/$1');
