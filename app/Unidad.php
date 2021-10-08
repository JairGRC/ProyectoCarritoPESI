<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = "unidades";
    protected $primaryKey = "codunidad";
    public $timestamps = false;

    protected $fillable = [
        'descripcion', 'estado'
    ];
}
