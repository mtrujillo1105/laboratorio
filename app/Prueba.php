<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    protected $primaryKey = 'id_prueba_a_realizar';

    protected $table = 'prueba_equipo';

    protected $fillable = [
        'CODEP_Codigo',
        'Descripcion_Prueba', 
        'Norma_Asoc_Prueba', 
        'Descripcion_Norma',
        'Costo',
        'Arch_Norma_Tecnica'
    ];

    public $timestamps = false;
}
