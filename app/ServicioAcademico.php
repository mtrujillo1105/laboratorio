<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioAcademico extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'tipo_servicio_academico';

    protected $fillable = [
		'SERVICIOAC_Nombre',
		'SERVICIOAC_Costo',
		'SERVICIOAC_Descripcion',
    	'Universidad_Procedencia',
    	'Nombre_Contacto',
    	'Correo_Electrónico_Contacto',
    	'Celular_Contacto',
    	'Tipo_Servicio_Academico',
		'Descripcion_Servicio_Solicitado'
    ];

    public $timestamps = false;
}
