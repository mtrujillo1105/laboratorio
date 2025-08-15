<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $primaryKey = 'COTIP_Codigo';

    protected $table = 'cotizacion';

    protected $fillable = [
		'id_contacto',
		'TIPOCOP_Codigo',
		'COTIP_Codigo',
	    'COTIC_Numero',
		'USUA_Codigo',
		'COTIC_SubTotal',
	    'COTIC_Igv',
	    'COTIC_Total',
		'COTIC_Fecha_Cotizacion',
        'COTIC_FechaModificacion',
	    'COTIC_Correo1',
	    'COTIC_Correo2',
	    'COTIC_Correo3',
		'COTIC_Correo4',
        'COTIC_flag_pedido',
        'COTIC_dcto_porcentaje',
        'COTIC_dcto_importe',
        'COTIC_dcto_subtotal'
	];

    public $timestamps = false;

    public function contacto()
    {
    	return $this->belongsTo('App\Cotizacion', 'id_contacto');
    }

    public function tipo_cotizacion()
    {
    	return $this->belongsTo('App\TipoCotizacion.php', 'TIPOCOP_Codigo');
    }

    public function ensayo(){
        return $this->hasMany('App\Ensayo','COTIP_Codigo');
    }
}
