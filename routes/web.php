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

Route::get('/', function () {
  return redirect()->route('login');
});

Route::get('/login', 'HomeController@landingPage')->name('login');

Route::get('/tes', function(){
	return view('test');
});

Auth::routes([
	'register' => false,
	'reset' => false,
	'verify' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/superadmin')->name('superadmin.')->middleware('superadmin')->group(function(){
	Route::get('/beranda', 'SuperController@index')->name('index');
	Route::get('/rayon', 'SuperController@showRayon')->name('rayon');
});

Route::prefix('/guru')->name('guru.')->middleware('guru')->group(function(){
	Route::get('/beranda', 'GuruController@index')->name('index');
});

Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function(){
	Route::get('/beranda', 'AdminController@showIndex')->name('index');
	Route::get('/data-siswa', 'AdminController@showSiswa')->name('siswa');
	Route::post('/data-siswa/simpan', 'AdminController@storeSiswa')->name('siswa.store');
	Route::get('/data-siswa/{id}/edit', 'AdminController@editSiswa')->name('siswa.edit');
	Route::delete('/data-siswa/{id}/delete', 'AdminController@destroySiswa')->name('siswa.delete');
	Route::get('/data-siswa/{id}/show', 'AdminController@showDataSiswa')->name('siswa.show');
	Route::get('/rapot', 'AdminController@showRapot')->name('rapot');
	Route::get('/data-guru', 'AdminController@showGuru')->name('guru');
	Route::get('/rayon', 'AdminController@showRayon')->name('rayon');
	Route::get('/rombel', 'AdminController@showRombel')->name('rombel');
	Route::get('/jurusan', 'AdminController@showJurusan')->name('jurusan');
});