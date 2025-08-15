<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
   protected $primaryKey = 'UBIGP_Codigo';

   protected $table = 'ubigeo';

   protected $fillable = [
       'UBIGC_CodDpto',
       'UBIGC_CodProv',
       'UBIGC_CodDist',
       'UBIGC_Descripcion',
       'UBIGC_FlagEstado'
    ];

   public $timestamps = false;

   public function solicitante()
   {
       return $this->hasMany('App\Solicitante');
   }
}


