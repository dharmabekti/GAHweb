<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', 'LoginController@home')->name('login.home');
Route::post('/login-auth', 'LoginController@doLogin')->name('login.auth');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/register-customer', 'LoginController@register')->name('login.register');
Route::post('/daftar-customer', 'LoginController@daftar')->name('login.daftar');
Route::get('/login/lupa-password','LoginController@lupapassword')->name('login.lupapassword');
Route::post('/login/reset-password','LoginController@reset')->name('login.reset');


Route::get('beranda', 'DashboardController@index')->name('dashboard'); // Dashboard
//Pengelolaan Kamar
Route::get('pengelolaan-kamar', 'KamarController@index')->name('kamar.tampil');
Route::get('/pengelolaan-kamar/cari','KamarController@pencarian')->name('kamar.cari');
Route::get('/pengelolaan-kamar/detil/{id}','KamarController@detilkamar')->name('kamar.detil');

//Pengelolaan Tarif & Seasion Kamar
Route::get('tarif-season', 'TarifSeasonController@index')->name('tarifseason.tampil'); 
Route::post('/tarif-season/simpan-tarif', 'TarifSeasonController@simpanTarif')->name('tarif.simpan');
Route::get('/tarif-season/edit-tarif/{id}', 'TarifSeasonController@editTarif')->name('tarif.edit');
Route::delete('/tarif-season/hapus-tarif/{id}', 'TarifSeasonController@hapusTarif')->name('tarif.hapus');

Route::post('/tarif-season/simpan-season', 'TarifSeasonController@simpanSeason')->name('season.simpan');
Route::get('/tarif-season/edit-season/{id}', 'TarifSeasonController@editSeason')->name('season.edit');
Route::delete('/tarif-season/hapus/{id}', 'TarifSeasonController@hapusSeason')->name('season.hapus');

//Pengelolaan Reservasi
Route::get('reservasi', 'ReservasiController@index')->name('reservasi.tampil');
Route::get('/reservasi/cari','ReservasiController@pencarian')->name('reservasi.cari');
Route::get('/reservasi/detil/{id}','ReservasiController@detilreservasi')->name('reservasi.detil');
Route::delete('/reservasi/batal/{id}','ReservasiController@batalreservasi')->name('reservasi.batal');

//Pengelolaan Akun
Route::get('pegawai', 'AkunController@index')->name('pegawai.tampil');
Route::post('/pegawai/simpan', 'AkunController@simpan')->name('pegawai.simpan');
Route::get('/pegawai/cari','AkunController@pencarian')->name('pegawai.cari');
Route::get('/pegawai/ubah/{id}','AkunController@ubah')->name('pegawai.ubah');
Route::delete('/pegawai/hapus/{id}','AkunController@hapus')->name('pegawai.hapus');
Route::get('/pegawai/reset-password/{id}', 'AkunController@resetpassword')->name('pegawai.resetpassword');

// Pengelolaan Customer
Route::post('customer/simpan', 'CustomerController@simpan')->name('customer.simpan');
Route::get('/customer/ubah/{id}','CustomerController@ubah')->name('customer.ubah');
Route::patch('/customer/ubah/{id}','CustomerController@simpanPerubahan')->name('customer.simpanperubahan');
Route::patch('/customer/ganti-password/{id}','CustomerController@gantiPassword')->name('customer.gantipassword');


//Daftar Tamu
Route::get('tamu', 'TamuController@index')->name('tamu.tampil');
Route::get('/tamu/cari','TamuController@pencarian')->name('tamu.cari');
Route::get('tamu/baru', 'TamuController@tambah')->name('tamu.baru');
Route::post('tamu/simpan', 'TamuController@simpan')->name('tamu.simpan');
Route::get('tamu/ubah/{id}', 'TamuController@ubah')->name('tamu.ubah');
Route::patch('tamu/simpanperubahan/{id}', 'TamuController@simpanperubahan')->name('tamu.simpanperubahan');
Route::get('tamu/detil/{id}', 'TamuController@detil')->name('tamu.detil');