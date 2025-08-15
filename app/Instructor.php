<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
	public $timestamps = false;

	protected $primaryKey =  'INSTP_Codigo';

    protected $table = 'instructor';

    protected $fillable = ['nombre', 'celular', 'email'];

    public function horarioInstructor()
    {
        return $this->hasMany('App\HorarioInstructor');
    }

    public function curso(){
        return $this->belongsToMany('App\Producto');
    }
}
