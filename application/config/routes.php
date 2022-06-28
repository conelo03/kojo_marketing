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
$route['default_controller'] = 'HomePelanggan';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home-pelanggan']				= 'HomePelanggan';
$route['registrasi-pelanggan']				= 'HomePelanggan/registrasi';

//pelanggan
$route['login-pelanggan'] 				= 'LoginPelanggan/proses';
$route['logout-pelanggan'] 				= 'LoginPelanggan/logout';
$route['dashboard-pelanggan']				= 'DashboardPelanggan';
$route['my-order'] 	        = 'DashboardPelanggan/order';
$route['riwayat-order'] 	        = 'DashboardPelanggan/riwayat_order';
$route['tambah-order-pelanggan/(:any)'] 	        = 'DashboardPelanggan/tambah_order/$1';
$route['tambah-order-pelanggan'] 	        = 'DashboardPelanggan/tambah_order';
$route['edit-order-pelanggan/(:any)'] 	    = 'DashboardPelanggan/edit_order/$1';
$route['hapus-order-pelanggan/(:any)']    	= 'DashboardPelanggan/hapus_order/$1';
$route['ulasan-order/(:any)']    	= 'DashboardPelanggan/ulasan_order/$1';

//pegawai
$route['administrator'] 				= 'Login';
$route['login'] 				= 'Login/proses';
$route['logout'] 				= 'Login/logout';
$route['dashboard']				= 'Dashboard';

//admin
$route['pegawai'] 				    = 'Pegawai';
$route['tambah-pegawai'] 	        = 'Pegawai/tambah';
$route['tambah-pegawai-modal'] 		= 'Pegawai/tambah_modal';
$route['edit-pegawai/(:any)'] 	    = 'Pegawai/edit/$1';
$route['hapus-pegawai/(:any)']    	= 'Pegawai/hapus/$1';
$route['profile'] 	       			= 'Pegawai/profile';
$route['setting']			   		= 'Pegawai/setting';

$route['akun'] 				    = 'Akun';
$route['tambah-akun'] 	        = 'Akun/tambah';
$route['edit-akun/(:any)'] 	    = 'Akun/edit/$1';
$route['hapus-akun/(:any)']    	= 'Akun/hapus/$1';

$route['produk'] 				    = 'Produk';
$route['tambah-produk'] 	        = 'Produk/tambah';
$route['edit-produk/(:any)'] 	    = 'Produk/edit/$1';
$route['hapus-produk/(:any)']    	= 'Produk/hapus/$1';

$route['order'] 				    = 'Order';
$route['tambah-order'] 	        = 'Order/tambah';
$route['all-order'] 	        = 'Order/all';
$route['admin-riwayat-order']		= 'Order/riwayat';
$route['edit-order/(:any)'] 	    = 'Order/edit/$1';
$route['hapus-order/(:any)']    	= 'Order/hapus/$1';
$route['detail-order/(:any)']		= 'Order/detail/$1';
$route['confirm-order/(:any)']		= 'Order/confirm/$1';
$route['rekapitulasi-order'] = 'Order/rekapitulasi';

$route['pelanggan'] 				    = 'Pelanggan';
$route['tambah-pelanggan'] 	        = 'Pelanggan/tambah';
$route['edit-pelanggan/(:any)'] 	    = 'Pelanggan/edit/$1';
$route['hapus-pelanggan/(:any)']    	= 'Pelanggan/hapus/$1';

$route['agenda'] 				    = 'Agenda';
$route['tambah-agenda'] 	        = 'Agenda/tambah';
$route['edit-agenda/(:any)'] 	    = 'Agenda/edit/$1';
$route['hapus-agenda/(:any)']    	= 'Agenda/hapus/$1';

$route['detail-agenda/(:any)'] 				    = 'Agenda/detail/$1';
$route['tambah-detail-agenda/(:any)'] 	        = 'Agenda/tambah_detail/$1';
$route['edit-detail-agenda/(:any)/(:any)'] 	    = 'Agenda/edit_detail/$1/$2';
$route['hapus-detail-agenda/(:any)/(:any)']    	= 'Agenda/hapus_detail/$1/$2';