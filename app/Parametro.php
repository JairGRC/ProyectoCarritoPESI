<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parametro extends Model
{
    protected $table = "parametros";
    protected $primaryKey = "tipo_id";
    public $timestamps = false;

    protected $fillable = [
        'numeracion', 'serie'
    ];

    public static function ActualizarNumeracion($tipo_id, $numeracion)
    {
        try{
            $parametro = Parametro::findOrFail($tipo_id);
            $parametro->numeracion = $numeracion;
            $parametro->save();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }
}
