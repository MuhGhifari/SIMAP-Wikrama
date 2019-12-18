<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $guarded = ['id'];

    public function kaprog(){
    	return $this->hasOne('App\Jurusan', 'kaprog_id');
    }

    public function rayon(){
    	return $this->hasOne('App\Rayon', 'pembimbing_id');
    }

    
}
