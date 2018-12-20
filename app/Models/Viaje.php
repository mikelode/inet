<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = 'inetHojaviaje';
    protected $primaryKey = 'viaId';
    public $timestamps = false;

    public function destinos(){
        return $this->hasMany('App\Models\Destino','dviHojaviaje','viaId');
    }

    public function obras(){
        return $this->hasMany('App\Models\Obradestino','oviHojaviaje','viaId');
    }

    public function actividades(){
        return $this->hasMany('App\Models\Actividad','actHojaviaje','viaId');
    }

    public function pasajeros(){
        return $this->hasMany('App\Models\Pasajero','psjHojaviaje','viaId');
    }

}
