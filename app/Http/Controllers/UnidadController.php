<?php

namespace App\Http\Controllers;

use App\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
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
        $unidad = Unidad::where('estado','=','1')
        ->where('descripcion', 'like', '%' .$buscarpor. '%')->paginate($this::PAGINATION);
        return view('tablas.unidades.index', compact('unidad','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidad=Unidad::where('estado','=','1')->get();
        return view('tablas.unidades.create', compact('unidad'));
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
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese el nombre de la unidad',
            'descripcion.max'=>'Maximo 40 caracteres para el nombre de la unidad'
        ]);
        $unidad = new Unidad();
        $unidad->descripcion=$request->descripcion;
        $unidad->estado='1';
        $unidad->save();
        return redirect()->route('unidad.index')->with('datos', 'Resgistro Nuevo Guardado!!');
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
        $unidad=Unidad::findOrFail($id);
        return view('tablas.unidades.edit', compact('unidad'));
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
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese el nombre de la unidad',
            'descripcion.max'=>'Maximo 40 caracteres para el nombre de la unidad'
        ]);
        $unidad = Unidad::findOrFail($id);
        $unidad->descripcion=$request->descripcion;
        $unidad->save();
        return redirect()->route('unidad.index')->with('datos', 'Resgistro Actualizado !!!');
    }

    public function confirmar($id)
    {
        $unidad=Unidad::findOrFail($id);
        return view('tablas.unidades.confirmar', compact('unidad'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unidad=Unidad::findOrFail($id);
        $unidad->estado='0';
        $unidad->save();
        return redirect()->route('unidad.index')->with('datos', 'Unidad Eliminada !!!');
    }
}
