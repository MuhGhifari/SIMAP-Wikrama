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

    public function kelasAjar(){
        return $this->hasMany('App\KelasAjar', 'guru_id');
    }

    public function mapel(){
        return $this->belongsTo('App\Mapel', 'mapel_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
