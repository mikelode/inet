<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'inetevento';
    protected $primaryKey = 'evtId';
    public $timestamps = false;
}
