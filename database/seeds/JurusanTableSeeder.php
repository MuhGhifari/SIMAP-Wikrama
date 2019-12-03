<?php

use Illuminate\Database\Seeder;
use App\Jurusan;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$nama = [
    		'Rekayasa Perangkat Lunak',
    		'Teknik Komputer Jaringan',
    		'Otomatisasi dan Tata Kelola Perkantoran',
    		'Bisnis Daring dan Pemasaran',
    		'Multimedia',
    		'Perhotelan',
    		'Tata Boga'
    	];

    	$kode = [
    		'RPL',
    		'TKJ',
    		'OTKP',
    		'BDP',
    		'MMD',
    		'HTL',
    		'TBG'
    	];

        for ($i=0; $i < count($nama); $i++) { 
        	Jurusan::create([
        		'kaprog_id' => 1,
        		'nama' => $nama[$i],
        		'kode' => $kode[$i]
        	]);
        }
    }
}
