<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table = 'inetobra';
    protected $primaryKey = 'obrId';
    public $timestamps = false;
}
