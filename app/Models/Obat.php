<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Obat extends Model
{
    protected $table = 'obat';
    protected $guarded = [];

    protected $primaryKey = 'kd_obat';

    public $incrementing = false;

    protected $keyType = 'string';
}
