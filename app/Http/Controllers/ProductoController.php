<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Categoria;
use App\Unidad;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     const PAGINATION = 4;

    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $producto=Producto::where('estado','=', '1')
        ->where('descripcion','like', '%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('tablas.productos.index', compact('producto', 'buscarpor'));
    }


    public function create()
    {
        $categoria=Categoria::where('estado','=','1')->get();
        $unidad=Unidad::where('estado','=','1')->get();
        return view('tablas.productos.create', compact('categoria', 'unidad'));
    }


    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion'=>'required|max:30',
            'precio'=>'required| min:0',
            'stock'=>'required|min:0',
        ],
        [
            'descripcion.required'=>'Ingrese descripción de categoria',
            'descripcion.max'=>'Maximo 30 caracteres para descripción',
            'precio.required'=>'Ingrese Precio',
            'precio.min'=>'El precio no puede ser negativo',
            'stock.required'=>'Ingrese Stock',
            'stock.min'=>'Stock no puede ser negativo'
        ]);
        $producto = new Producto();
        $producto->descripcion=$request->descripcion;
        $producto->codcategoria=$request->codcategoria;
        $producto->codigounidad=$request->codigounidad;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->estado='1';
        $producto->save();
        return redirect()->route('producto.index')->with('datos', 'Resgistro Nuevo Guardado!!');
    }


    public function show($id)
    {
        //
    }

    public function edit($codigoproducto)
    {
        $producto=Producto::findOrFail($codigoproducto);
        $categoria=Categoria::where('estado', '=', '1')->get();
        $unidad=Unidad::where('estado', '=', '1')->get();
        return view('tablas.productos.edit', compact('producto', 'categoria', 'unidad'));
    }


    public function update(Request $request, $codigoproducto)
    {
        $data=request()->validate([
            'descripcion'=>'required|max:30'
        ],
        [
            'descripcion.required'=>'Ingrese descripción de producto',
            'descripcion.max'=>'Máximo 30 caracteres para la descipcion'
        ]);
        $producto=Producto::findOrFail($codigoproducto);
        $producto->descripcion=$request->descripcion;
        $producto->codcategoria=$request->codcategoria;
        $producto->codigounidad=$request->codigounidad;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->save();
        return redirect()->route('producto.index')->with('datos', 'Registro Actualizado !!!');

    }

    public function confirmar($codigoproducto)
    {
        $producto=Producto::findOrFail($codigoproducto);
        return view('tablas.productos.confirmar', compact('producto'));
    }

    public function destroy($codigoproducto)
    {
        $producto=Producto::findOrFail($codigoproducto);
        $producto->estado='0';
        $producto->save();
        return redirect()->route('producto.index')->with('datos', 'Registro Eliminado !!!');
    }
}
