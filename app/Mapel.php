<?php

namespace App;

use App\Guru;
use App\Rombel;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $guarded = ['id'];

    public function guru(){
    	return $this->hasMany('App\Guru', 'mapel_id');
    }
}
