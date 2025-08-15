<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCotizacion extends Model
{
    protected $primaryKey = 'TIPOCOP_Codigo';

    protected $table = 'tipocotizacion';

    protected $fillable = ['TIPOCOC_Descripcion'];

    public $timestamps = false;

    public function cotizacion()
    {
    	return $this->hasMany('App\Cotizacion', 'TIPOCOP_Codigo');
    }
}

