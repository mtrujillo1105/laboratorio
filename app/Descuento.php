<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{

    protected $table = 'descuentos';

    protected $primaryKey = 'id_descuento';

    protected $fillable = ['id_curso', 'cantidad_min', 'cantidad_max', 'descuento'];

    public $timestamps = false;

    public function curso()
    {
        return $this->belongsTo('App\Producto');
    }
}
