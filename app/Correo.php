<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'correos';

    protected $fillable = ['email1', 'email2', 'email3', 'email4'];

    public $timestamps = false;
}
