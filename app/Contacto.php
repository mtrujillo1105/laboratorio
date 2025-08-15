<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $primaryKey = 'id_contacto';

    protected $table = 'contacto';

    protected $fillable = ['SOLIP_Codigo','nombre_contacto', 'correo_contacto', 'celular_contacto'];

    public $timestamps = false;

    public function solicitante()
    {
    	return $this->belongsTo('App\Solicitante','SOLIP_Codigo');
    }

    public function cotizacion()
    {
    	return $this->hasMany('App\Cotizacion','id_contacto');
    }
}
