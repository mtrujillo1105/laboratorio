<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ensayo extends Model
{
    protected $table = 'cotizacion_detalle';
    protected $primaryKey = 'CODEP_Codigo';

    //public $incrementing = false;

    //protected $keyType = 'int';

    protected $fillable = [

        'COTIP_Codigo',
    	'CODEC_Nombre_Equipo',
    	'CODEC_Descripcion_Equipo',
        'CODEC_Fabricante_Equipo',
        'CODEC_Descripcion_Ficha_Tecnica_Equipo',
        'CODEC_Url_Ficha_Tecnica_Equipo',
        'CODEC_Costo',
        'CODEC_Archivo_Descripcion_Equipo',
        'CODEC_FlagEstado',
        'CODEC_Cantidad',
    ];

    public function cotizacion(){
        return $this->belongsTo('App\Cotizacion','COTIP_Codigo');
    }

}
