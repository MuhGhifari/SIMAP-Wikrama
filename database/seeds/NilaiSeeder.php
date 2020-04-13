<?php
use App\Siswa;
use App\Mapel;
use App\Nilai;

use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$dummy = Faker\Factory::create();
	    for ($i = 1; $i <= 10; $i++) {
	    	Nilai::create([
	    		'siswa_id' => $i,
	    		'guru_id' => $dummy->numberBetween(1, 15),
                'rombel_id' => $dummy->numberBetween(1, 14),
	    		'uh1' => $dummy->numberBetween(60, 95),
	    		'uh2' => $dummy->numberBetween(60, 95),
                'uh3' => $dummy->numberBetween(60, 95),
                'uh4' => $dummy->numberBetween(60, 95),
                'uh5' => $dummy->numberBetween(60, 95),
                'uh6' => $dummy->numberBetween(60, 95),
                'uh7' => $dummy->numberBetween(60, 95),
                'uh8' => $dummy->numberBetween(60, 95),
	    		'uh1k' => $dummy->numberBetween(60, 95),
                'uh2k' => $dummy->numberBetween(60, 95),
                'uh3k' => $dummy->numberBetween(60, 95),
                'uh4k' => $dummy->numberBetween(60, 95),
                'uh5k' => $dummy->numberBetween(60, 95),
                'uh6k' => $dummy->numberBetween(60, 95),
                'uh7k' => $dummy->numberBetween(60, 95),
                'uh8k' => $dummy->numberBetween(60, 95),
	    		'uts_ganjil' => $dummy->numberBetween(60, 95),
                'uas_ganjil' => $dummy->numberBetween(60, 95),
                'uts_genap' => $dummy->numberBetween(60, 95),
                'uas_genap' => $dummy->numberBetween(60, 95),
	    	]);
	    }
    }
}
