<?php

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

		
	//  CRUD Rombel
	Route::get('/rombel', 'AdminController@showRombel')->name('rombel');
	Route::post('/rombel/simpan', 'AdminController@storeRombel')->name('rombel.store');
	Route::get('/rombel/{id}/edit', 'AdminController@editRombel')->name('rombel.edit');
	Route::delete('/rombel/{id}/hapus', 'AdminController@destroyRombel')->name('rombel.edit');

	//  CRUD Jurusan
	Route::get('/jurusan', 'AdminController@showJurusan')->name('jurusan');
	Route::post('/jurusan/simpan', 'AdminController@storeJurusan')->name('jurusan.store');
	Route::get('/jurusan/{id}/edit', 'AdminController@editJurusan')->name('jurusan.edit');
	Route::delete('/jurusan/{id}/hapus', 'AdminController@destroyJurusan')->name('jurusan.edit');

	//  CRUD Rayon
	Route::get('/rayon', 'AdminController@showRayon')->name('rayon');
	Route::post('/rayon/simpan', 'AdminController@storeRayon')->name('rayon.store');
	Route::get('/rayon/{id}/edit', 'AdminController@editRayon')->name('rayon.edit');
	Route::delete('/rayon/{id}/hapus', 'AdminController@destroyRayon')->name('rayon.edit');

});