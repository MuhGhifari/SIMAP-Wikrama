<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
        $this->call(RombelTableSeeder::class);
        $this->call(RayonTableSeeder::class);
        $this->call(JurusanTableSeeder::class);
        $this->call(GuruTableSeeder::class);
    }
}
