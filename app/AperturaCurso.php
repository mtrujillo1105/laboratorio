<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AperturaCurso extends Model
{
    protected $primaryKey = 'ID_Apertura';

    protected $table = 'apertura_curso';

    protected $fillable = ['ID_Apertura', 'Nombre_Apertura', 'Fecha_Apertura', 'Cantidad_Horas', 'Matriculados', 'id_curso','INSTP_Codigo'];

    public $timestamps = false;

    public function horarioApertura()
    {
        return $this->hasOne('App\HorarioCurso');
    }
}
