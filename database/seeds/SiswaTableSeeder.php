<?php

use Illuminate\Database\Seeder;
use App\Siswa;

class SiswaTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$dummy = Faker\Factory::create('id_ID');
	   	$nis = [
			'1170',
			'1180',
			'1190'
	   ];
	   $jk = [
			'Laki-laki',
			'Perempuan',
	   ];
	   $agama = [
			'Katolik',
			'Protestan',
			'Islam',
			'Hindu',
			'Buddha',
	   ];

	  for ($i=0; $i < 50; $i++) { 
	  	$date = $dummy->dateTimeBetween($startDate = '-20 years', $endDate = '-15 years');
		Siswa::create([
			'nisn' => $dummy->unique()->randomNumber($nbDigits = 8),
			'nis' => $nis[array_rand($nis)] . $dummy->unique()->randomNumber($nbDigits = 4, $strict = true),
			'nama' => $dummy->name,
			'jk' =>	$jk[array_rand($jk)],
			'agama' => $agama[array_rand($agama)],
			'rayon_id' => rand(1,25),
			'rombel_id' => rand(1,21),
			'telp' => $dummy->phoneNumber,	
			'alamat' => $dummy->address,	
			'tanggal_lahir' => $date,	
			'tempat_lahir' => $dummy->city,
			'asal_sekolah' => $dummy->company,
		]);
	  }
	}
}
