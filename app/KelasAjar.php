<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasAjar extends Model
{
    protected $table = 'kelas_ajar';
    protected $guarded = ['id'];

    public function guru(){
    	return $this->belongsTo('App\Guru', 'guru_id');
    }

    public function rombel(){
    	return $this->belongsTo('App\Rombel', 'rombel_id');
    }
}
