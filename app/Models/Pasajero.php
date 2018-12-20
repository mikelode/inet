<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    protected $table = 'inetpasajeroviaje';
    protected $primaryKey = null;
    public $timestamps = false;
    public $incrementing = false;
}
