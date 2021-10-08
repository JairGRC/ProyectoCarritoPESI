<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CabeceraVenta;
use App\DetalleVenta;
use App\Tipo;
use App\Parametro;
use App\Producto;
use App\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
use App\Pago;

class CabeceraVentasController extends Controller
{

    const PAGINATION = 8;

    public function index(Request $request)
    {
        $buscarpor = $request->buscarpor;
        $cabeceraventa = Cabeceraventa::where('estado', '=', '1')
            ->where('codventa', 'like', '%' . $buscarpor . '%')->paginate($this::PAGINATION);
        return view('tablas.cabeceraventas.index', compact('cabeceraventa', 'buscarpor'));
    }


    public function create()
    {
        $cliente = DB::table('clientes')->get();
        $producto = DB::table('productos')->get();
        $tipo = Tipo::all();
        $tipou = Tipo::select('codtipo', 'descripcion')->orderBy('codtipo', 'DESC')->get();
        $parametros = Parametro::findOrFail($tipou[0]->codtipo);
        return view('tablas.cabeceraventas.create', compact('tipo', 'parametros', 'cliente', 'producto'));
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $cliente = Cliente::where('ruc_dni', '=', $request->ruc_dni)->get();
            $codcliente = $cliente[0]->codcliente;
            $venta = new CabeceraVenta();
            $venta->codcliente = $codcliente;
            $venta->nrodoc = Str::substr($request->get('nrodoc'), 3, 6);
            $venta->codtipo = $request->seltipo;
            $arr = explode('/', $request->fecha);
            $nFecha = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
            $venta->fechaventa = $nFecha;

            if ($request->seltipo = '2') {
                $venta->total = $request->total;
                $venta->subtotal = round((100/118)*($request->total), 2);
                $venta->igv = round((9/59)*($request->total), 2);
            } else {
                $venta->total = $request->total;
                $venta->subtotal = round((100/118)*($request->total), 2);
                $venta->igv = round((9/59)*($request->total), 2);
            }

            $venta->estado = '1';
            $venta->save();    

            $codigoproducto = $request->get('cod_producto');
            $cantidad = $request->get('cantidad');
            $pventa = $request->get('pventa');

            $cont = 0;

            while ($cont < count($codigoproducto)) {
                $detalle = new DetalleVenta();
                $detalle->codventa = $venta->codventa;
                $detalle->codigoproducto = $codigoproducto[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio = $pventa[$cont];
                $detalle->save();
                // Actualizar stock 
                Producto::ActualizarStock($detalle->codigoproducto, $detalle->cantidad);
                $cont = $cont + 1;
            }

            // Actualizar Numeración
            $numero = '0';
            $parametro = Parametro::findOrFail($venta->codtipo);
            $numeracion = (int) $parametro->numeracion;
            if($numeracion == 999999){
                $numero = '000001';
            } else {
                $numeracion++;
                switch (Str::length($numeracion)){
                    case 1:
                        $numero = '00000' .(string) $numeracion;
                        break;
                    case 2:
                        $numero = '0000' .(string) $numeracion;
                        break;
                    case 3:
                        $numero = '000' .(string) $numeracion;
                        break;
                    case 4:
                        $numero = '00' .(string) $numeracion;
                        break;
                    case 5:
                        $numero = '0' .(string) $numeracion;
                        break;
                    case 6:
                        $numero = (string) $numeracion;
                        break;
                }
            }
            Parametro::ActualizarNumeracion($venta->codtipo, $numero);

            $metodoPago = $request->radioPago;
            $pago = new Pago();
            if($metodoPago == '1'){
                $montoPago = $request->montoPago;
                $vuelto = $montoPago - $venta->total;
                $pago->monto = $montoPago;
                $pago->vuelto = $vuelto;
                $pago->idtipopago = 1;
                $pago->codventa = $venta->codventa;
                $pago->save();
            } else if($metodoPago == '2'){
                $pago->visa = $request->nroTarjeta;
                $pago->vuelto = 0;
                $pago->idtipopago = 2;
                $pago->codventa = $venta->codventa;
                $pago->save();
            }

            DB::commit();

            return redirect()->route('recibo', ['codventa' => $venta->codventa]);

        } catch (Exception $e) {
            DB::rollback();
        }
    }


    public function recibo($codventa){
        $venta = CabeceraVenta::findOrFail($codventa);
        $query = Pago::where('codventa', '=', $codventa)->get();
        $idpago = $query[0]->idpago;
        $pago = Pago::findOrFail($idpago);
        return view('tablas.recibo.index', compact('venta', 'pago'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


    public function PorTipo($codigotipo)
    {        
        return DB::table('tipo as t')->join('parametros as p','p.codtipo','=','t.codtipo')                 
         ->where('t.codtipo','=',$codigotipo)->select('t.codtipo','t.descripcion','p.serie','p.numeracion')->get(); 
    }


    public function ProductoCodigo($codigoproducto){
        return DB::table('productos as p')->join('unidades as u','p.codigounidad','=','u.codunidad')
        ->where('p.estado','=','1')->where('p.codigoproducto','=',$codigoproducto)
        ->select('p.codigoproducto','p.descripcion','u.descripcion as unidad','p.precio','p.stock')->get();
    }

}
