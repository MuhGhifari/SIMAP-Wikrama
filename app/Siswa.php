<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function rayon(){
    	return $this->belongsTo('App\Rayon', 'rayon_id');
    }

    public function rombel(){
    	return $this->belongsTo('App\Rombel', 'rombel_id');
    }
}
