<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'inetcomentario';
    protected $primaryKey = 'comId';
    public $timestamps = false;
}
