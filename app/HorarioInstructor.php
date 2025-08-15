<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioInstructor extends Model
{
    protected $primaryKey = 'id_horario_instructor';

    protected $table = 'horario_instructor';

    protected $fillable = ['nombre_instructor', 'fecha_inicial', 'fecha_final', 'hora_inicial', 'hora_final', 'Dia_Posible', 'INSTP_Codigo'];

    public $timestamps = false;

    public function instructor()
    {
        return $this->belongsTo('App\Instructor');
    }
}
