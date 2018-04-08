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
//Route::get('/login', 'LoginController@login')->name('login.index');


Route::get('beranda', 'DashboardController@index')->name('dashboard'); // Dashboard
//Pengelolaan Kamar
Route::get('pengelolaan-kamar', 'KamarController@index')->name('kamar.tampil');
Route::get('/pengelolaan-kamar/cari','KamarController@pencarian')->name('kamar.cari');

//Pengelolaan Tarif & Seasion Kamar
Route::get('tarif-season', 'TarifSeasonController@index')->name('tarifseason.tampil'); 
Route::post('/tarif-season/simpan-tarif', 'TarifSeasonController@simpanTarif')->name('tarif.simpan');
Route::get('/tarif-season/edit-tarif/{id}', 'TarifSeasonController@editTarif')->name('tarif.edit');
Route::delete('/tarif-season/hapus-tarif/{id}', 'TarifSeasonController@hapusTarif')->name('tarif.hapus');

Route::post('/tarif-season/simpan-season', 'TarifSeasonController@simpanSeason')->name('season.simpan');
Route::get('/tarif-season/edit-season/{id}', 'TarifSeasonController@editSeason')->name('season.edit');
Route::delete('/tarif-season/hapus/{id}', 'TarifSeasonController@hapusSeason')->name('season.hapus');