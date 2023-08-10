<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'index';
$route['folder1/folder2/controller'] = 'folder1/folder2/ControllerName/method';
$route['Sundries/Barang'] = 'Sundries/Barang/c_barang/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// c_atuh
$route['auth'] = 'auth/c_auth';
$route['home'] = 'auth/c_auth/home';
$route['logout'] = 'auth/c_auth/logout';
$route['dashboard'] = 'Page_his/home';
<<<<<<< HEAD
=======
$route['data-user'] = 'Auth/c_role/user';

// Personal Data
$route['data-karyawan'] = 'Page_his/karyawan';
$route['data-karyawan-keluar'] = 'Page_his/karyawan_out';
$route['data-karyawan-training-dan-percobaan'] = 'Page_his/karyawan_temp';
$route['data-karyawan-training-dan-percobaan-keluar'] = 'Page_his/karyawan_out_temp';
$route['daftar-divisi'] = 'Page_his/divisi';
$route['daftar-departemen'] = 'Page_his/departemen';
$route['daftar-section'] = 'Page_his/section';
$route['daftar-shift'] = 'Page_his/shift';
$route['daftar-jabatan'] = 'Page_his/jabatan';
$route['daftar-golongan'] = 'Page_his/golongan';
>>>>>>> rief-branch


