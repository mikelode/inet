<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'inetsector';
    protected $primaryKey = 'sctId';
    public $timestamps = false;
}
