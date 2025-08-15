<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    protected $primaryKey = 'COCAP_Codigo';
 
    protected $table = 'cotizacion_capacitacion';

    protected $fillable = [
        'COTIP_Codigo',
        'id_curso',
        'COCAC_Detalle_Curso_Cotizar',
        'COCAC_Horario_Tentativo_Curso',
        'COCAC_Lugar_Capacitacion',
        'COCAC_Cantidad',
        'COCAC_Costo_Curso_Original',
        'COCAC_SubTotal',
        'COCAC_Descuento_Porcentaje',
        'COCAC_Descuento_Moneda_Real',
        'COCAC_SubTotal_Descontado'
    ];    
    
    public $timestamps = false;

    public function curso()
    {
    	return $this->belongsTo('App\Capacitacion', 'id_curso');
    }
}
