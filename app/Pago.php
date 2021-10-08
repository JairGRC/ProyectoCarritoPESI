<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = "pago";
    protected $primaryKey = "idpago";
    public $timestamps = false;

    protected $fillable = [
        'visa', 'monto', 'vuelto', 'idtipopago', 'codventa'
    ];

    public function cabeceraventa() {
        return $this->hasOne('App\CabeceraVenta', 'codventa', 'codventa');
    }
}
