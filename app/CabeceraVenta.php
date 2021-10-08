<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CabeceraVenta extends Model
{
    protected $table = "cabeceraventas";
    protected $primaryKey = "codventa";
    public $timestamps = false;

    protected $fillable = [
        'codcliente', 'codtipo', 'fechaventa', 'nrodoc', 'subtotal', 'igv', 'total', 'estado'
    ];

    public function cliente() {
        return $this->hasOne('App\Cliente', 'codcliente', 'codcliente');
    }

    public function detalleVentas() {
        return $this->belongsToMany('App\Producto', 'detalleventas', 'codventa', 'codigoproducto');
    }

    public function tipo() {
        return $this->hasOne('App\Tipo', 'codtipo', 'codtipo');
    }

    public function pago() {
        return $this->hasMany('App\Pago', 'codventa', 'codventa');
    }

}
