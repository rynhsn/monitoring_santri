<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('/', 'Home::index');
$routes->group('/', ['filter' => 'login'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->group('menus',['filter' => 'permission:manage-menu'] , function ($routes) {
        $routes->get('', 'Menus::index');
        $routes->post('create', 'Menus::store');
        $routes->post('get', 'Menus::getMenu');
        $routes->put('update', 'Menus::update');
        $routes->delete('delete', 'Menus::destroy');
    });
    $routes->group('submenus',['filter' => 'permission:manage-menu'] , function ($routes) {
        $routes->get('', 'SubMenus::index');
        $routes->post('create', 'SubMenus::store');
        $routes->post('get', 'SubMenus::getSubMenu');
        $routes->put('update', 'SubMenus::update');
        $routes->delete('delete', 'SubMenus::destroy');
    });

    //users
    $routes->group('users', ['filter' => 'permission:manage-user'], function ($routes) {
        $routes->get('', 'Users::index');
        $routes->get('detail/(:num)', 'Users::detail/$1');
        $routes->post('update-role/(:num)', 'Users::updateRole/$1');
        $routes->post('update-email/(:num)', 'Users::updateEmail/$1');
        $routes->post('update-username/(:num)', 'Users::updateUsername/$1');
        $routes->post('update-password/(:num)', 'Users::updatePassword/$1');
        $routes->post('update-profile/(:num)', 'Users::updateProfile/$1');
        $routes->post('create', 'Users::store');
        $routes->post('get', 'Users::getUser');
        $routes->post('activate', 'Users::activate');
        $routes->put('update', 'Users::update');
        $routes->delete('delete', 'Users::destroy');
    });

    //roles
    $routes->group('roles', ['filter' => 'permission:manage-permission'], function ($routes) {
        $routes->get('', 'Roles::index');
        $routes->get('detail/(:num)', 'Roles::detail/$1');
        $routes->post('create', 'Roles::store');
        $routes->get('get/(:num)', 'Roles::getRole/$1');
        $routes->put('update', 'Roles::update');
        $routes->delete('delete', 'Roles::destroy');
    });

    //permissions
    $routes->group('permissions', ['filter' => 'permission:manage-permission'], function ($routes) {
        $routes->get('', 'Permissions::index');
        $routes->post('create', 'Permissions::store');
        $routes->post('get', 'Permissions::getPermission');
        $routes->put('update', 'Permissions::update');
        $routes->delete('delete', 'Permissions::destroy');
    });

    $routes->group('santri', ['filter' => 'permission:manage-santri'], function ($routes){
        $routes->get('', 'Santri::index');
    });

    $routes->group('kelas', ['filter' => 'permission:manage-settings'], function ($routes){
        $routes->get('', 'Kelas::index');
        $routes->post('store', 'Kelas::store');
        $routes->get('delete/(:num)', 'Kelas::destroy/$1');
    });

    $routes->group('lembaga', ['filter' => 'permission:manage-settings'], function ($routes){
        $routes->get('', 'Lembaga::index');
        $routes->post('store', 'Lembaga::store');
    });

    $routes->group('pengajar', ['filter' => 'permission:manage-settings'], function ($routes){
        $routes->get('', 'Pengajar::index');
        $routes->get('create', 'Pengajar::create');
        $routes->get('update/(:num)', 'Pengajar::update/$1');
        $routes->put('update/profile/(:num)', 'Pengajar::profileUpdate/$1');
        $routes->put('update/account/(:num)', 'Pengajar::accountUpdate/$1');
        $routes->post('store', 'Pengajar::store');
        $routes->get('delete/(:num)', 'Pengajar::drop/$1');
        $routes->get('ketua/(:num)', 'Pengajar::buatKetua/$1');
    });

    $routes->group('koordinator', ['filter' => 'permission:manage-settings'], function ($routes){
        $routes->get('', 'Koordinator::index');
        $routes->get('create', 'Koordinator::create');
        $routes->get('update/(:num)', 'Koordinator::update/$1');
        $routes->put('update/profile/(:num)', 'Koordinator::profileUpdate/$1');
        $routes->put('update/account/(:num)', 'Koordinator::accountUpdate/$1');
        $routes->post('store', 'Koordinator::store');
        $routes->get('delete/(:num)', 'Koordinator::drop/$1');
        $routes->get('ketua/(:num)', 'Koordinator::buatKetua/$1');
    });

    $routes->group('wali', ['filter' => 'permission:manage-settings'], function ($routes){
        $routes->get('', 'Wali::index');
        $routes->get('create', 'Wali::create');
        $routes->get('update/(:num)', 'Wali::update/$1');
        $routes->put('update/profile/(:num)', 'Wali::profileUpdate/$1');
        $routes->put('update/account/(:num)', 'Wali::accountUpdate/$1');
        $routes->post('store', 'Wali::store');
        $routes->get('delete/(:num)', 'Wali::drop/$1');
    });

    $routes->group('santri', ['filter' => 'permission:manage-settings'], function ($routes){
        $routes->get('', 'Santri::index');
        $routes->post('store', 'Santri::store');
        $routes->get('update/(:num)', 'Santri::update/$1');
        $routes->put('update/profile/(:num)', 'Santri::profileUpdate/$1');
        $routes->get('delete/(:num)', 'Santri::drop/$1');
    });

    $routes->group('hafalan', ['filter' => 'permission:manage-hafalan'], function ($routes) {
        $routes->get('', 'Hafalan::index');
        $routes->post('store', 'Hafalan::store');
        $routes->get('delete/(:num)', 'Hafalan::drop/$1');
        $routes->get('filter', 'Hafalan::filter');
    });

    $routes->group('data-ekskul', ['filter' => 'permission:manage-ekstrakurikuler'], function ($routes) {
        $routes->post('store', 'DataEkskul::store');
        $routes->get('delete/(:num)', 'DataEkskul::drop/$1');
    });

    $routes->group('ekstrakurikuler', ['filter' => 'permission:manage-ekstrakurikuler'], function ($routes) {
        $routes->get('', 'Ekstrakurikuler::index');
    });

});

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
