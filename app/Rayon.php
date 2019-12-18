<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $table = 'rayon';
    protected $guarded = ['id'];

    public function siswa(){
    	return $this->hasMany('App\Siswa', 'rayon_id');
    }

    public function pembimbing(){
    	return $this->belongsTo('App\Guru', 'pembimbing_id');
    }
}
