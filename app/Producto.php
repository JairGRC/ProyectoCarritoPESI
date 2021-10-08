<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    protected $table = "productos";
    protected $primaryKey = "codigoproducto";
    public $timestamps = false;

    protected $fillable = [
        'descripcion', 'codcategoria', 'codigounidad', 'stock', 'precio', 'estado'
    ];

    public function categoria()
    {
        return $this->hasOne('App\Categoria', 'codcategoria', 'codcategoria');
    }

    public function unidad()
    {
        return $this->hasOne('App\Unidad', 'codunidad', 'codigounidad');
    }

    public static function ActualizarStock($codigoproducto, $cantidad)
    {
        return DB::select(DB::raw("UPDATE productos SET stock = stock - '".$cantidad."' WHERE codigoproducto = '".$codigoproducto."'"));
    }

}
