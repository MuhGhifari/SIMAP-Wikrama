<?php

use Illuminate\Database\Seeder;
use App\Guru;
use App\User;

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
        'mapel_id' => random_int(1, 10),
    		'jk' => $jk[array_rand($jk)],
    		'telp' => $dummy->phoneNumber,
    		'alamat' => $dummy->address
      ]);
    }
    $guru = Guru::all();
    foreach ($guru as $new) {
      $user = new User();
      $user->name = $new->nama;
      $user->username = $new->nik;
      $user->password = bcrypt($new->nik);
      $user->role = 'guru';
      $user->save();
      $user_id = $user->id;
      Guru::updateOrCreate(['id' => $new->id],
      [
        'user_id' => $user_id,
      ]);
    }
  }
}
