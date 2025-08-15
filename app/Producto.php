<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
   protected $primaryKey = 'id_curso';

   protected $table = 'curso';

   protected $fillable = ['CURSOC_Nombre','CURSOC_Costo','CURSOC_Descripcion'];

   public $timestamps = false;

   public function instructor()
   {
      return $this->belongsToMany('App\Instructor');
   }

   public function aperturaCurso()
   {
       return $this->hasMany('App\HorarioInstructor');
   }

   public function descuento()
   {
       return $this->hasMany('App\Descuento');
   }
}


