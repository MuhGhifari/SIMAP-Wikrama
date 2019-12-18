<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guru;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $guarded = ['id'];

    public function kaprog(){
    	return $this->belongsTo('App/Guru', 'kaprog_id');
    }
}
