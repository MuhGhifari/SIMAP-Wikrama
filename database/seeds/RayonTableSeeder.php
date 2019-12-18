<?php

use App\Rayon;
use Illuminate\Database\Seeder;

class RayonTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$nama = [
			'Cia 1',
			'Cia 2',
			'Cia 3',
			'Cia 4',
			'Cia 5',
			'Cis 1',
			'Cis 2',
			'Cis 3',
			'Cis 4',
			'Cis 5',
			'Cis 6',
			'Cib 1',
			'Cib 2',
			'Cib 3',
			'Cic 1',
			'Cic 2',
			'Cic 3',
			'Cic 4',
			'Cic 5',
			'Cic 6',
			'Cic 7',
			'Suk 1',
			'Suk 2',
			'Taj 1',
			'Taj 2',
			'Taj 3',
			'Taj 4',
			'Taj 5',
			'Wik 1',
			'Wik 2',
			'Wik 3',
			'Wik 4',
		];

		$dummy = Faker\Factory::create();

		for ($i = 0; $i < count($nama); $i++) {
			Rayon::create([
				'nama' => $nama[$i],
				'pembimbing_id' => $dummy->unique()->numberBetween(1, 50),
				'ruangan' => $dummy->unique()->numberBetween(202, 250),
			]);
		}
	}
}
