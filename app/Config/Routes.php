<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');

$routes->get('login', 'Auth::index');
$routes->get('register', 'Auth::register');
$routes->add('setlogin', 'Auth::saveLogin');
$routes->add('savereg', 'Auth::saveReg');
$routes->add('logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'auth'],  function($routes){
	$routes->get('/', 'Admin::index');
	$routes->get('dashboard', 'Admin::dashboard');

    $routes->group('kategori', function($routes){
		$routes->get('/', 'Kategori::index');
		$routes->add('tambah_kategori', 'Kategori::tambah_kategori');
		$routes->add('edit_kategori', 'Kategori::edit_kategori');
		$routes->add('hapus_kategori', 'Kategori::hapus_kategori');
	});

	$routes->group('lokasi', function($routes){
		$routes->get('/', 'Lokasi::index');
		$routes->add('tambah_lokasi', 'Lokasi::tambah_lokasi');
		$routes->add('edit_lokasi', 'Lokasi::edit_lokasi');
		$routes->add('hapus_lokasi', 'Lokasi::hapus_lokasi');
	});

	$routes->group('kejadian', function($routes){
		$routes->get('/', 'Kejadian::index');
		$routes->add('tambah_kejadian', 'Kejadian::tambah_kejadian');
		$routes->add('edit_kejadian', 'Kejadian::edit_kejadian');
		$routes->add('hapus_kejadian', 'Kejadian::hapus_kejadian');
	});

	$routes->group('bantuan', function($routes){
		$routes->get('/', 'Bantuan::index');
		$routes->add('tambah_bantuan', 'Bantuan::tambah_bantuan');
		$routes->add('edit_bantuan', 'Bantuan::edit_bantuan');
		$routes->add('hapus_bantuan', 'Bantuan::hapus_bantuan');
	});
	
	$routes->group('jenisbantuan', function($routes){
		$routes->get('/', 'Jenisbantuan::index');
		$routes->add('tambah_jenisbantuan', 'Jenisbantuan::tambah_jenisbantuan');
		$routes->add('edit_jenisbantuan', 'Jenisbantuan::edit_jenisbantuan');
		$routes->add('hapus_jenisbantuan', 'Jenisbantuan::hapus_jenisbantuan');
	});

	$routes->group('user', function($routes){
		$routes->get('/', 'User::index');
		$routes->add('tambah_user', 'User::tambah_user');
		$routes->add('edit_user', 'User::edit_user');
		$routes->add('hapus_user', 'User::hapus_user');
	});
} );
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
