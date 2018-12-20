<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'inetentidad';
    protected $primaryKey = 'entId';
    public $timestamps = false;
}
