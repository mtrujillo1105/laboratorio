<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoInstructor extends Model
{

   protected $primaryKey = 'id_curso_instructor';

   protected $table = 'curso_instructor';

   protected $fillable = ['id_curso', 'INSTP_Codigo','id_curso_instructor'];

   public $timestamps = null;

   
   public function instructor(){
      return $this->belongsToMany('App\Instructor');
   }

   public function curso(){
      return $this->belongsToMany('App\Producto');
  }

}


