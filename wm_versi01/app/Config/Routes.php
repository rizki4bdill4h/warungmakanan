<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
// $routes->set404Override();
$routes->set404Override(function () {
	return view('errors/cli/custom404');
});
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


//user
$routes->group('/', function ($routes) {
	$routes->get('', 'Home::index');
	$routes->get('listmenu', 'Home::listmenu');
	$routes->get('blog', 'Home::blog');
});

//listmenu
$routes->group('listmenu', function ($routes) {
	$routes->get('detaildaging', 'listmenu::menudaging');
	$routes->get('detailayam', 'listmenu::menuayam');
	$routes->get('detailikan', 'listmenu::menuikan');
	$routes->get('detailtelor', 'listmenu::menutelor');
	$routes->get('detaillainya', 'listmenu::menulainya');
	$routes->get('/(:segment)', 'listmenu::detaildaging/segment/$1');
	$routes->get('/(:segment)', 'listmenu::detailayam/segment/$1');
	$routes->get('/(:segment)', 'listmenu::detailikan/segment/$1');
	$routes->get('/(:segment)', 'listmenu::detailtelor/segment/$1');
	$routes->get('/(:segment)', 'listmenu::detaillainya/segment/$1');
});

//admin
$routes->group('akses', function ($routes) {
	$routes->get('', 'Admin\Akses::index');
	//daging
	$routes->get('daging', 'Admin\Akses::daging');
	$routes->delete('daging/(:num)', 'Admin\Akses::deletedaging/$1');
	$routes->get('detaildaging/(:any)', 'Admin\Akses::detaildaging/$1');
	$routes->get('createdaging', 'Admin\Akses::createdaging');
	$routes->match(['get', 'post'], 'updatedaging/(:num)', 'Admin\Akses::updatedaging/$1');
	$routes->get('daging/(:segment)', 'Admin\Akses::editdaging/$1');
	$routes->match(['get', 'post'], 'savedaging', 'Admin\Akses::savedaging');
	//ayam
	$routes->get('ayam', 'Admin\Akses::ayam');
	$routes->delete('ayam/(:num)', 'Admin\Akses::deleteayam/$1');
	$routes->get('detailayam/(:any)', 'Admin\Akses::detailayam/$1');
	$routes->get('createayam', 'Admin\Akses::createayam');
	$routes->match(['get', 'post'], 'updateayam/(:num)', 'Admin\Akses::updateayam/$1');
	$routes->get('ayam/(:segment)', 'Admin\Akses::editayam/$1');
	$routes->match(['get', 'post'], 'saveayam', 'Admin\Akses::saveayam');
	//ikan
	$routes->get('ikan', 'Admin\Akses::ikan');
	$routes->delete('ikan/(:num)', 'Admin\Akses::deleteikan/$1');
	$routes->get('detailikan/(:any)', 'Admin\Akses::detailikan/$1');
	$routes->get('createikan', 'Admin\Akses::createikan');
	$routes->match(['get', 'post'], 'updateikan/(:num)', 'Admin\Akses::updateikan/$1');
	$routes->get('ikan/(:segment)', 'Admin\Akses::editikan/$1');
	$routes->match(['get', 'post'], 'saveikan', 'Admin\Akses::saveikan');
	//telur
	$routes->get('telur', 'Admin\Akses::telur');
	$routes->delete('telur/(:num)', 'Admin\Akses::deletetelur/$1');
	$routes->get('detailtelur/(:any)', 'Admin\Akses::detailtelur/$1');
	$routes->get('createtelur', 'Admin\Akses::createtelur');
	$routes->match(['get', 'post'], 'updatetelur/(:num)', 'Admin\Akses::updatetelur/$1');
	$routes->get('telur/(:segment)', 'Admin\Akses::edittelur/$1');
	$routes->match(['get', 'post'], 'savetelur', 'Admin\Akses::savetelur');
	//lainya
	$routes->get('lainya', 'Admin\Akses::lainya');
	$routes->delete('lainya/(:num)', 'Admin\Akses::deletelainya/$1');
	$routes->get('detaillainya/(:any)', 'Admin\Akses::detaillainya/$1');
	$routes->get('createlainya', 'Admin\Akses::createlainya');
	$routes->match(['get', 'post'], 'updatelainya/(:num)', 'Admin\Akses::updatelainya/$1');
	$routes->get('lainya/(:segment)', 'Admin\Akses::editlainya/$1');
	$routes->match(['get', 'post'], 'savelainya', 'Admin\Akses::savelainya');
});
//daging

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
