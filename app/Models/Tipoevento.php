<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipoevento extends Model
{
    protected $table = 'inettipoevento';
    protected $primaryKey = 'tevId';
    public $timestamps = false;
}
