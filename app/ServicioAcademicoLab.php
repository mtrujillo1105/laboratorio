<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioAcademicoLab extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'tipo_servicio_academico';

    protected $fillable = [
		'SERVICIOAC_Nombre',
		'SERVICIOAC_Descripcion',
    ];

    public $timestamps = false;
}
