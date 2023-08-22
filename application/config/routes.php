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
$route['Sundries/Barang'] = 'Sundries/Barang/c_barang/barangpage';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// c_atuh
$route['auth'] = 'auth/c_auth';
$route['home'] = 'auth/c_auth/home';
$route['logout'] = 'auth/c_auth/logout';
$route['dashboard'] = 'Page_his/home';
$route['data-user'] = 'Page_his/user';

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


# -------------------------- SUNDRIES -------------------------- #
// User

// Barang
$route['barang'] = 'Sundries/Barang/c_barang/index';
$route['addbarang'] = 'Sundries/Barang/c_barang/addBarang';
$route['addbarangother'] = 'Sundries/Barang/c_barang/addBarangOther';
$route['updatebarang/(:num)'] = 'Sundries/Barang/c_barang/updateBarang/$1';
$route['deletebarang/(:num)'] = 'Sundries/Barang/c_barang/deleteBarang/$1';

// Jenis
$route['jenis'] = 'Sundries/Master/c_jenis/index';
$route['addjenis'] = 'Sundries/Master/c_jenis/addJenis';
$route['updatejenis/(:num)'] = 'Sundries/Master/c_jenis/updateJenis/$1';
$route['deletejenis/(:num)'] = 'Sundries/Master/c_jenis/deleteJenis/$1';

// Kategori
$route['kategori'] = 'Sundries/Master/c_kategori/index';
$route['addkategori'] = 'Sundries/Master/c_kategori/addKategori';
$route['updatekategori/(:num)'] = 'Sundries/Master/c_kategori/update/$1';
$route['deletekategori/(:num)'] = 'Sundries/Master/c_kategori/deleteKategori/$1';

// Estimasi
$route['estimasi'] = 'Sundries/Transaksi/c_estimasi/index';
$route['addkeranjangestimasi'] = 'Sundries/Transaksi/c_estimasi/addKeranjang';
$route['showkeranjangestimasi'] = 'Sundries/Transaksi/c_estimasi/showKeranjang';
$route['deletekeranjangestimasi'] = 'Sundries/Transaksi/c_estimasi/deleteKeranjang';
$route['addestimasi'] = 'Sundries/Transaksi/c_estimasi/addEstimasi';
$route['deleteestimasi/(:num)'] = 'Sundries/Transaksi/c_estimasi/deleteEstimasi/$1';
$route['detailestimasi/(:num)'] = 'Sundries/Transaksi/c_estimasi/detailEstimasi/$1';
$route['printestimasi'] = 'Sundries/Transaksi/c_estimasi/printEstimasi';
$route['approveestimasi'] = 'Sundries/Transaksi/c_estimasi/approveEstimasi';
$route['rejectestimasi'] = 'Sundries/Transaksi/c_estimasi/rejectEstimasi';

// Konsumsi
$route['konsumsi'] = 'Sundries/Transaksi/c_konsumsi/index';
$route['barangfaktur'] = 'Sundries/Transaksi/c_konsumsi/barangFaktur';
$route['addkeranjangkonsumsi'] = 'Sundries/Transaksi/c_konsumsi/addKeranjang';
$route['showkeranjangkonsumsi'] = 'Sundries/Transaksi/c_konsumsi/showKeranjang';
$route['deletekeranjangkonsumsi'] = 'Sundries/Transaksi/c_konsumsi/deleteKeranjang';
$route['addkonsumsi'] = 'Sundries/Transaksi/c_konsumsi/addKonsumsi';
$route['deletekonsumsi/(:num)'] = 'Sundries/Transaksi/c_konsumsi/deleteKonsumsi/$1';
$route['detailkonsumsi/(:num)'] = 'Sundries/Transaksi/c_konsumsi/detailKonsumsi/$1';
$route['printkonsumsi'] = 'Sundries/Transaksi/c_konsumsi/printKonsumsi';
$route['approvekonsumsi'] = 'Sundries/Transaksi/c_konsumsi/approveKonsumsi';
$route['rejectkonsumsi'] = 'Sundries/Transaksi/c_konsumsi/rejectKonsumsi';

// Pembelian
$route['pembelian'] = 'Sundries/Transaksi/c_pembelian/index';
$route['formpembelian'] = 'Sundries/Transaksi/c_pembelian/formPembelian';
$route['addkeranjangpembelian'] = 'Sundries/Transaksi/c_pembelian/addKeranjang';
$route['showkeranjangpembelian'] = 'Sundries/Transaksi/c_pembelian/showKeranjang';
$route['deletekeranjangpembelian'] = 'Sundries/Transaksi/c_pembelian/deleteKeranjang';
$route['addpembelian'] = 'Sundries/Transaksi/c_pembelian/addPembelian';
$route['detailpembelian/(:num)'] = 'Sundries/Transaksi/c_pembelian/detailPembelian/$1';
$route['printpembelian'] = 'Sundries/Transaksi/c_pembelian/printPembelian';
$route['formpembelian'] = 'Sundries/Transaksi/c_pembelian/formPembelian';

// Penerimaan
$route['penerimaan'] = 'Sundries/Transaksi/c_penerimaan/index';
$route['addpenerimaan'] = 'Sundries/Transaksi/c_penerimaan/addPenerimaan';
$route['formpenerimaan'] = 'Sundries/Transaksi/c_penerimaan/formPenerimaan';

// Permintaan
$route['permintaan'] = 'Sundries/Transaksi/c_permintaan/index';
$route['detailpermintaan/(:any)'] = 'Sundries/Transaksi/c_permintaan/detail/$1';
$route['updatepermintaan/(:num)'] = 'Sundries/Transaksi/c_permintaan/updateJumlah/$1';
$route['cekkeranjangpermintaan'] = 'Sundries/Transaksi/c_permintaan/cekKeranjang';
$route['showkeranjangpermintaan'] = 'Sundries/Transaksi/c_permintaan/showKeranjang';
$route['deletekeranjangpermintaan'] = 'Sundries/Transaksi/c_permintaan/deleteKeranjang';
$route['addpermintaan'] = 'Sundries/Transaksi/c_permintaan/addPermintaan';
$route['deletepermintaan/(:num)'] = 'Sundries/Transaksi/c_permintaan/deletePermintaan/$1';
$route['printpermintaan'] = 'Sundries/Transaksi/c_permintaan/printPermintaan';
$route['approvepermintaan'] = 'Sundries/Transaksi/c_permintaan/approvePermintaan';
$route['rejectpermintaan'] = 'Sundries/Transaksi/c_permintaan/rejectPermintaan';
$route['addbarang'] = 'Sundries/Transaksi/c_permintaan/addBarang';
$route['deletebarangpermintaan/(:num)'] = 'Sundries/Transaksi/c_permintaan/deleteBarang/$1';
$route['detailbarang/(:num)'] = 'Sundries/Transaksi/c_permintaan/detailBarang/$1';
$route['permintaanulang/(:num)'] = 'Sundries/Transaksi/c_permintaan/permintaanUlang/$1';
$route['permintaanproses/(:num)'] = 'Sundries/Transaksi/c_permintaan/permintaanProses/$1';
$route['permintaanselesai/(:num)'] = 'Sundries/Transaksi/c_permintaan/permintaanSelesai/$1';
$route['permintaansiap/(:num)'] = 'Sundries/Transaksi/c_permintaan/permintaanSiap/$1';
