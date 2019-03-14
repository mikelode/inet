<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $table = 'ctlvisitante';
    protected $primaryKey = 'visId';
    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo('App\Models\Persona','visPersona','perId');
    }

}
