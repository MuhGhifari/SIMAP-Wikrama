<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataRombel extends Model
{
    protected $table = 'view_rombel';

    public function siswa(){
    	return $this->hasMany('App\Siswa', 'rombel_id');
    }
}
