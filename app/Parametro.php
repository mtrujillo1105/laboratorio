<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $primaryKey = 'id_parametro';

    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'parametro';

    protected $fillable = ['id_parametro', 'nombre', 'id_parametro_padre', 'eliminado'];

    public function parametroValor()
    {
    	return $this->hasMany('App\ParametroValor');
    }
}
