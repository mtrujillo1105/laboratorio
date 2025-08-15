<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSolicitante extends Model
{
    protected $primaryKey = 'TIPSOLIP_Codigo';

    protected $table = 'tiposolicitante';

    protected $fillable = ['TIPSOLIC_Descripcion'];

    public $timestamps = false;

    public function solicitante()
    {
    	return $this->hasMany('App\Solicitante', 'TIPSOLIP_Codigo');
    }
}
