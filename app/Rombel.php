<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jurusan;

class Rombel extends Model
{
    protected $table = 'rombel';
    protected $guarded = ['id'];

    public function jurusan(){
    	return $this->belongsTo('App\Jurusan', 'jurusan_id');
    }

    public function kelasAjar(){
    	return $this->hasMany('App\KelasAjar', 'rombel_id');
    }

    public function siswa(){
    	return $this->hasMany('App\Siswa', 'rombel_id');
    }
}
