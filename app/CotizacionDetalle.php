<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionDetalle extends Model
{
    protected $primaryKey = 'CODEP_Codigo';

    protected $table = 'cotizacion_detalle';

    protected $fillable = [
        'CODEC_Nombre_Equipo',
        'CODEC_Descripcion_Equipo',
        'CODEC_Fabricante_Equipo',
        'CODEC_Url_Ficha_Tecnica_Equipo',
        'CODEC_Cantidad',
        'CODEC_Costo',
        'CODEC_SubTotal',
        'COTIP_Codigo',
        'CODEC_Descripcion_Ficha_Tecnica_Equipo',
        'CODEC_Archivo_Descripcion_Equipo',
        'CODEC_dcto_porcentaje',
        'CODEC_dcto_importe',
        'CODEC_dcto_subtotal'
    ];

    public $timestamps = false;

    public function pruebas(){
        return $this->hasMany('App\Prueba','CODEP_Codigo');
    }
}
