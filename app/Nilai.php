<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $guarded = ['id'];

    public function siswa(){
    	return $this->belongsTo('App\Siswa', 'siswa_id');
    }

    public function guru(){
    	return $this->belongsTo('App\Guru', 'guru_id');
    }

    public function rombel(){
    	return $this->belongsTo('App\Rombel', 'rombel_id');
    }
}
