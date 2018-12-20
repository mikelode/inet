<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    protected $table = 'inetubigeo';
    protected $primaryKey = 'ubiId';
    public $timestamps = false;
}
