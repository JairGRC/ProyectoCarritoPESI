<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = "tipo";
    protected $primaryKey = "codtipo";
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];

    public function ventas()
    {
        return $this->hasMany('App\CabeceraVenta', 'codtipo', 'codtipo');
    }
}
