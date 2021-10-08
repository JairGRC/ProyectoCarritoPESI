<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const PAGINATION=8;

    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $cliente = Cliente::where('estado','=','1')
        ->where('nombres', 'like', '%' .$buscarpor. '%')->paginate($this::PAGINATION);
        return view('tablas.clientes.index', compact('cliente','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente=Cliente::where('estado','=','1')->get();
        return view('tablas.clientes.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'nombres'=>'required|max:60',
            'direccion'=>'required|max:60',
            'ruc_dni'=>'required|max:10',
            'email'=>'required|max:60'
        ],
        [
            'nombres.required'=>'Ingrese el nombre del cliente',
            'nombres.max'=>'Maximo 60 caracteres para el nombre del cliente',
            'direccion.required'=>'Ingrese la dirección del cliente',
            'direccion.max'=>'Maximo 60 caracteres para la dirección del cliente',
            'ruc_dni.required'=>'Ingrese número de DNI o RUC',
            'ruc_dni.max'=>'Maximo 10 caracteres para el DNI o RUC',
            'email.required'=>'Ingrese el email del cliente',
            'email.max'=>'Maximo 60 caracteres para el email del cliente'
        ]);
        $cliente = new Cliente();
        $cliente->nombres=$request->nombres;
        $cliente->direccion=$request->direccion;
        $cliente->ruc_dni=$request->ruc_dni;
        $cliente->email=$request->email;
        $cliente->estado='1';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos', 'Resgistro Nuevo Guardado!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view('tablas.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'nombres'=>'required|max:60',
            'direccion'=>'required|max:60',
            'ruc_dni'=>'required|max:10',
            'email'=>'required|max:60'
        ],
        [
            'nombres.required'=>'Ingrese el nombre del cliente',
            'nombres.max'=>'Maximo 60 caracteres para el nombre del cliente',
            'direccion.required'=>'Ingrese la dirección del cliente',
            'direccion.max'=>'Maximo 60 caracteres para la dirección del cliente',
            'ruc_dni.required'=>'Ingrese número de DNI o RUC',
            'ruc_dni.max'=>'Maximo 10 caracteres para el DNI o RUC',
            'email.required'=>'Ingrese el email del cliente',
            'email.max'=>'Maximo 60 caracteres para el email del cliente'
        ]);
        $cliente = Cliente::findOrFail($id);
        $cliente->nombres=$request->nombres;
        $cliente->direccion=$request->direccion;
        $cliente->ruc_dni=$request->ruc_dni;
        $cliente->email=$request->email;
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos', 'Resgistro Actualizado !!!');
    }

    public function confirmar($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view('tablas.clientes.confirmar', compact('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->estado='0';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos', 'Cliente Eliminado !!!');
    }
}
