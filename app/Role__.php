<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'rol';

    protected $fillable = ['ROL_Codigo', 'Rol_Descripcion'];

    public $timestamps = false;
/*  esto es con role_use pivote   public function users(){
        return $this->belongsToMany('App\User');
    } */

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
