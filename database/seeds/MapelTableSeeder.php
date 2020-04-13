<?php

use App\Mapel;
use Illuminate\Database\Seeder;

class MapelTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
  	$mapel = [
  		'Bahasa Indonesia',
  		'Bahasa Inggris',
  		'Matematika',
  		'Tata Boga',
  		'Web',
  		'Jaringan',
  		'Marketing',
  		'Customer Service',
  		'Desain Grafis',
  		'Kearsipan',
  	];

  	$kode = [
  		'B.INDO',
  		'B.ING',
  		'MTK',
  		'TABOG',
  		'WEB',
  		'JARINGAN',
  		'MARKETING',
  		'CUSTOMER SERVICE',
  		'DESGRAF',
  		'ARSIP',
  	];

  	$kompetensi = [
  		'umum',
  		'umum',
  		'umum',
  		'kejuruan',
  		'kejuruan',
  		'kejuruan',
  		'kejuruan',
  		'kejuruan',
  		'kejuruan',
  		'kejuruan',
  	];

    $dummy = Faker\Factory::create();

    for ($i = 0; $i < count($mapel); $i++) {
    	Mapel::create([
    		'nama' => $mapel[$i],
    		'kode' => $kode[$i],
    		'kompetensi' => $kompetensi[$i],
        'kkm' => 75,
    	]);
    }
  }
}
