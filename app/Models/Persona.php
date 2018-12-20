<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'inetpersona';
    protected $primaryKey = 'perId';
    public $timestamps = false;
}
