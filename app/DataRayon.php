<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataRayon extends Model
{
    protected $table = 'view_rayon';

    public function siswa(){
    	return $this->hasMany('App\Siswa', 'rayon_id');
    }
}
