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

// Middleware Admin
Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function(){
	
	// Halaman Dashboard
	Route::get('/beranda', 'AdminController@showIndex')->name('index');
	
	// CRUD Siswa
	Route::get('/data-siswa', 'AdminController@showSiswa')->name('siswa');
		Route::post('/data-siswa/simpan', 'AdminController@storeSiswa')->name('siswa.store');
		Route::get('/data-siswa/{id}/edit', 'AdminController@editSiswa')->name('siswa.edit');
		Route::delete('/data-siswa/{id}/hapus', 'AdminController@destroySiswa')->name('siswa.delete');
		Route::get('/data-siswa/{id}/show', 'AdminController@showDataSiswa')->name('siswa.show');

	// Halaman Rapot
	Route::get('/rapot-siswa', 'AdminController@showRapot')->name('rapot');
	
	// CRUD Guru
	Route::get('/data-guru', 'AdminController@showGuru')->name('guru');
		Route::post('/data-guru/simpan', 'AdminController@storeGuru')->name('guru.store');
		Route::get('/data-guru/{id}/edit', 'AdminController@editGuru')->name('guru.edit');
		Route::delete('/data-guru/{id}/hapus', 'AdminController@destroyGuru')->name('guru.delete');
		Route::get('/data-guru/{id}/show', 'AdminController@showDataGuru')->name('guru.show');

	// Halaman Kelas
	Route::get('/kelas', 'AdminController@showKelas')->name('kelas');
		
		//  CRUD Rombel
		Route::get('/kelas/rombel', 'AdminController@showRombel')->name('kelas.rombel');
		Route::post('/kelas/rombel/simpan', 'AdminController@storeRombel')->name('kelas.rombel.store');
		Route::get('/kelas/rombel/{id}/edit', 'AdminController@editRombel')->name('kelas.rombel.edit');
		Route::delete('/kelas/rombel/{id}/hapus', 'AdminController@destroyRombel')->name('kelas.rombel.edit');

		//  CRUD Jurusan
		Route::get('/kelas/jurusan', 'AdminController@showJurusan')->name('kelas.jurusan');
		Route::post('/kelas/jurusan/simpan', 'AdminController@storeJurusan')->name('kelas.jurusan.store');
		Route::get('/kelas/jurusan/{id}/edit', 'AdminController@editJurusan')->name('kelas.jurusan.edit');
		Route::delete('/kelas/jurusan/{id}/hapus', 'AdminController@destroyJurusan')->name('kelas.jurusan.edit');

		//  CRUD Rayon
		Route::get('/kelas/rayon', 'AdminController@showRayon')->name('kelas.rayon');
		Route::post('/kelas/rayon/simpan', 'AdminController@storeRayon')->name('kelas.rayon.store');
		Route::get('/kelas/rayon/{id}/edit', 'AdminController@editRayon')->name('kelas.rayon.edit');
		Route::delete('/kelas/rayon/{id}/hapus', 'AdminController@destroyRayon')->name('kelas.rayon.edit');

});