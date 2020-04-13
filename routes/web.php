<?php

// Redirect login
Route::get('/', function () {
  return redirect()->route('login');
});
Route::get('/login', 'HomeController@landingPage')->name('login');

Auth::routes([
	'register' => false,
	'reset' => false,
	'verify' => false
]);



Route::get('/home', 'HomeController@index')->name('home');

// Middleware Superadmin
Route::prefix('/superadmin')->name('superadmin.')->middleware('superadmin')->group(function(){
	
	// CRUD User
	Route::get('/beranda', 'SuperController@index')->name('index');
		Route::post('/beranda/simpan/user', 'SuperController@store')->name('index.store');
		Route::get('/beranda/{id}/edit', 'SuperController@edit')->name('index.edit');
		Route::delete('/beranda/{id}/hapus', 'SuperController@destroy')->name('index.destroy');
});


// Middleware Guru
Route::prefix('/guru')->name('guru.')->middleware('guru')->group(function(){
	
	Route::get('/beranda', 'GuruController@index')->name('index');

	// Profile Guru
	Route::get('/profile', 'GuruController@showProfile')->name('profile');
	Route::post('/profile/password/store', 'GuruController@storePassword')->name('profile.password.store');
	Route::post('/profile/bio/store', 'GuruController@storeBio')->name('profile.bio.store');
	Route::post('/profile/foto/store', 'GuruController@storeProfilPhoto')->name('profile.photo.store');


	// Halaman Data Siswa Kelas
	Route::get('/beranda/nilai/{id}/kelas', 'GuruController@showNilaiKelas')->name('index.absen.kelas');

	// Request Ajax Siswa Kelas
	Route::get('/nilai/kelas/absen', 'GuruController@getAbsen')->name('absen.kelas.get');

	// UTS 1
	Route::get('/nilai/uts-ganjil', 'GuruController@showNilaiUtsGanjil')->name('nilai.uts-ganjil');
	Route::post('/nilai/uts-ganjil/store', 'GuruController@storeNilai')->name('nilai.uts-ganjil.store');

	// UAS
	Route::get('/nilai/uas-ganjil', 'GuruController@showNilaiUasGanjil')->name('nilai.uas-ganjil');
	Route::post('/nilai/uas-ganjil/store', 'GuruController@storeNilai')->name('nilai.uas-ganjil.store');

	// UTS 2
	Route::get('/nilai/uts-genap', 'GuruController@showNilaiUtsGenap')->name('nilai.uts-genap');
	Route::post('/nilai/uts-genap/store', 'GuruController@storeNilai')->name('nilai.uts-genap.store');
	
	// UKK
	Route::get('/nilai/uas-genap', 'GuruController@showNilaiUasGenap')->name('nilai.uas-genap');
	Route::post('/nilai/uas-genap/store', 'GuruController@storeNilai')->name('nilai.uas-genap.store');
});


// Middleware Admin
Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function(){

	Route::get('beranda', 'AdminController@index')->name('index');

	// Profile Admin
	Route::get('/profile', 'AdminController@showProfile')->name('profile');
	Route::post('/profile/password/store', 'AdminController@storePassword')->name('profile.password.store');
	Route::post('/profile/bio/store', 'AdminController@storeBio')->name('profile.bio.store');
	Route::post('/profile/foto/store', 'AdminController@storeProfilPhoto')->name('profile.photo.store');
	
	// CRUD Siswa
	Route::get('/data-siswa', 'AdminController@showSiswa')->name('siswa');
		Route::post('/data-siswa/simpan', 'AdminController@storeSiswa')->name('siswa.store');
		Route::get('/data-siswa/{id}/edit', 'AdminController@editSiswa')->name('siswa.edit');
		Route::delete('/data-siswa/{id}/hapus', 'AdminController@destroySiswa')->name('siswa.delete');
		Route::get('/data-siswa/{id}/show', 'AdminController@showDataSiswa')->name('siswa.show');
		Route::get('/data-siswa/import', 'AdminController@showImportSiswa')->name('siswa.import');
		Route::post('/data-siswa/import/save', 'AdminCOntroller@storeImportSiswa')->name('siswa.import.store');

	// Halaman Rapot
	Route::get('/rapot-siswa', 'AdminController@showRapot')->name('rapot');
		
		// Kelas 10
		Route::get('/rapot-siswa/kelas-10', 'AdminController@showKelas10')->name('rapot.kelas-10');
		Route::get('/rapot-siswa/kelas-10/{nis}/nilai', 'AdminController@showNilaiSiswa')->name('rapot.kelas-10.nilai');
		Route::get('/rapot-siswa/kelas-10/{nis}/nilai/show', 'AdminController@showNilai')->name('rapot.kelas-10.nilai.show');
		
		// Kelas 11
		Route::get('/rapot-siswa/kelas-11', 'AdminController@showKelas11')->name('rapot.kelas-11');
		Route::get('/rapot-siswa/kelas-11/{nis}/nilai', 'AdminController@showNilaiSiswa')->name('rapot.kelas-11.nilai');
		Route::get('/rapot-siswa/kelas-11/{nis}/nilai/show', 'AdminController@showNilai')->name('rapot.kelas-11.nilai.show');

		// Kelas 12
		Route::get('/rapot-siswa/kelas-12', 'AdminController@showKelas12')->name('rapot.kelas-12');
		Route::get('/rapot-siswa/kelas-12/{nis}/nilai', 'AdminController@showNilaiSiswa')->name('rapot.kelas-12.nilai');
		Route::get('/rapot-siswa/kelas-12/{nis}/nilai/show', 'AdminController@showNilai')->name('rapot.kelas-12.nilai.show');
	
		// CRUD Nilai
		Route::post('/rapot-siswa/{nis}/nilai/simpan', 'AdminController@storeNilai')->name('rapot.nilai.store');
		
		// Cetak Rapot
		Route::post('/rapot-siswa/{nis}/nilai/cetak', 'AdminController@cetakRapot')->name('rapot.nilai.cetak');

	// CRUD Guru
	Route::get('/data-guru', 'AdminController@showGuru')->name('guru');
		Route::post('/data-guru/simpan', 'AdminController@storeGuru')->name('guru.store');
		Route::get('/data-guru/{id}/edit', 'AdminController@editGuru')->name('guru.edit');
		Route::delete('/data-guru/{id}/hapus', 'AdminController@destroyGuru')->name('guru.delete');
		Route::get('/data-guru/{id}/show', 'AdminController@showDataGuru')->name('guru.show');
		Route::get('/data-guru/mapel', 'AdminController@showMapelGuru')->name('guru.show.mapel');
		Route::get('/data-guru/{id}/mapel/edit', 'AdminController@editMapelGuru')->name('guru.edit.mapel');

		
	//  CRUD Rombel
	Route::get('/rombel', 'AdminController@showRombel')->name('rombel');
		Route::post('/rombel/simpan', 'AdminController@storeRombel')->name('rombel.store');
		Route::get('/rombel/{id}/edit', 'AdminController@editRombel')->name('rombel.edit');
		Route::delete('/rombel/{id}/hapus', 'AdminController@destroyRombel')->name('rombel.delete');

	//	CRUD Kelas Ajar
	Route::get('/rombel/{rombel_id}/kelas-ajar', 'AdminController@showKelasAjarRombel')->name('rombel.kelas-ajar');
		Route::post('/rombel/kelas-ajar/fetch-guru', 'AdminController@showKelasAjarGuru')->name('rombel.kelas-ajar.guru');
		Route::post('/rombel/kelas-ajar/simpan', 'AdminController@storeKelasAjar')->name('rombel.kelas-ajar.store');
		Route::get('/rombel/kelas-ajar/{id}/edit', 'AdminController@editKelasAjar')->name('rombel.kelas-ajar.edit');
		Route::get('/rombel/kelas-ajar/{id}/{rombel_id}/hapus', 'AdminController@destroyKelasAjar')->name('rombel.kelas-ajar.delete');
		Route::get('/rombel/kelas-ajar/{id}/show-detail', 'AdminController@showDetailPelajaran')->name('rombel.kelas-ajar.detail-pelajaran');

	//  CRUD Jurusan
	Route::get('/jurusan', 'AdminController@showJurusan')->name('jurusan');
		Route::get('/jurusan/calon', 'AdminController@calonKaprog')->name('jurusan.calon');
		Route::get('/jurusan/{id}/kaprog', 'AdminController@editKaprog')->name('jurusan.edit.kaprog');
		Route::post('/jurusan/simpan', 'AdminController@storeJurusan')->name('jurusan.store');
		Route::get('/jurusan/{id}/edit', 'AdminController@editJurusan')->name('jurusan.edit');
		Route::delete('/jurusan/{id}/hapus', 'AdminController@destroyJurusan')->name('jurusan.edit');

	//  CRUD Rayon
	Route::get('/rayon', 'AdminController@showRayon')->name('rayon');
		Route::get('/rayon/calon', 'AdminController@calonPembimbing')->name('rayon.calon');
		Route::get('/rayon/{id}/pembimbing', 'AdminController@editPembimbing')->name('rayon.edit.pembimbing');
		Route::post('/rayon/simpan', 'AdminController@storeRayon')->name('rayon.store');
		Route::get('/rayon/{id}/edit', 'AdminController@editRayon')->name('rayon.edit');
		Route::delete('/rayon/{id}/hapus', 'AdminController@destroyRayon')->name('rayon.edit');

	//	CRUD Mapel
	Route::get('/mapel', 'AdminController@showMapel')->name('mapel');
		Route::post('/mapel/simpan', 'AdminController@storeMapel')->name('mapel.store');
		Route::get('/mapel/{id}/edit', 'AdminController@editMapel')->name('mapel.edit');
		Route::delete('/mapel/{id}/hapus', 'AdminController@destroyMapel')->name('mapel.edit');

});