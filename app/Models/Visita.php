<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = 'ctlvisita';
    protected $primaryKey = 'vtaId';
    public $timestamps = false;

    public function detalle()
    {
        return $this->hasMany('App\Models\Detallevisita','dvtVisita','vtaId')->orderBy('dvtFecha','desc');
    }
}
