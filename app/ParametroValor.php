<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParametroValor extends Model
{
    protected $primaryKey = 'id_parametro_valor';

    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'parametro_valor';

    protected $fillable = ['id_parametro_valor','id_parametro', 'id_parametro_valor_padre', 'nombre', 'valor', 'valor_adicional_1',
                'valor_adicional_2', 'valor_adicional_3', 'activo', 'eliminado', 'orden'];
}
