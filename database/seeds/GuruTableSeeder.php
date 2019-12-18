<?php

use Illuminate\Database\Seeder;
use App\Guru;

class GuruTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $dummy = Faker\Factory::create('id_ID');
    $jk = ['Laki-laki', 'Perempuan'];
    for ($i=0; $i < 50; $i++) { 
      Guru::create([
    		'nik' => $dummy->nik,
    		'nama' => $dummy->name,
    		'jk' => $jk[array_rand($jk)],
    		'telp' => $dummy->phoneNumber,
    		'alamat' => $dummy->address
      ]);
    }
  }
}
