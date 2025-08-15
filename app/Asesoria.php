<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesoria extends Model
{
    protected $primaryKey = 'id_asesoria';

    protected $table = 'asesorias';

    protected $fillable = [
    	'Nombre_Empresa',
    	'Nombre_Contacto',
    	'Correo_Electrónico_Contacto',
    	'Celular_Contacto',
    	'Nombre_Asesoria_Laboratorio',
    	'Descripcion_Asesoria'
    ];

    public $timestamps = false;
}
