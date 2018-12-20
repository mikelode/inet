<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    protected $table = 'inetdirectorio';
    protected $primaryKey = 'dirId';
    public $timestamps = false;
}
