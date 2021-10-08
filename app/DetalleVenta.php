<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = "detalleventas";
    protected $primaryKey = "codventa";
    public $timestamps = false;

    protected $fillable = [
        'precio', 'cantidad'
    ];

    public function venta()
    {
        return $this->hasOne(CabeceraVenta::class, 'codventa', 'codventa');
    }

    public function productos()
    {
        return $this->hasMany('App\Producto', 'codigoproducto', 'codigoproducto');
    }
}
