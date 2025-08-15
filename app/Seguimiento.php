<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $primaryKey = 'id_seguimiento';

    protected $table = 'bitacora_seguimiento';

    protected $fillable = [
		'id_cotizacion',
		'titulo',
	    'mensaje',
		'fecha_registro',
		'usuario_registro',
	    'fecha_modificacion',
	    'usuario_modificacion',
		'flag_historico',
        'fecha_seguimiento'
	];

    public $timestamps = false;

    // public function cotizacion(){
    //     return $this->hasMany('App\Cotizacion','id_contacto');
    // }
}
