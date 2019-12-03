<?php

use Illuminate\Database\Seeder;
use App\Rombel;

class RombelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan_id = [
            1,
            1,
            2,
            2,
            5,
            5,
            3,
            3,
            7,
            7,
            6,
            6,
            4,
            4,
        ];

        $nama = [
            'RPL XI-1',
            'RPL XII-1',
            'TKJ XI-1',
            'TKL XII-1',
            'MMD XI-1',
            'MMD XII-1',
            'OTKP XI-1',
            'OTKP XII-1',
            'TBG XI-1',
            'TBG XII-1',
            'HTL XI-1',
            'HTL XII-1',
            'BDP XI-1',
            'BDP XII-1',
        ];

        $tingkatan = [
            '11',
            '12',
            '11',
            '12',
            '11',
            '12',
            '11',
            '12',
            '11',
            '12',
            '11',
            '12',
            '11',
            '12',
        ];
    	
        for ($i=0; $i < count($nama); $i++) { 
        	Rombel::create([
                'jurusan_id' => $jurusan_id[$i],
                'nama' =>$nama[$i],
                'tahun_ajaran' =>'2019/2020',
                'tingkatan' =>$tingkatan[$i],
        	]);
        }
    }
}
