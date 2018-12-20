<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'inetpublicacion';
    protected $primaryKey = 'pubId';
    public $timestamps = false;

    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentario','comPublicacion','pubId');
    }
}
