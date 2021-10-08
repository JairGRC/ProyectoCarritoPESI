<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Panel Principal

Route::get('/', function () {
    return view('index');
});

Route::get('/inicio', 'InicioController@index')->name('home');

Route::get(('/AboutUs'), function () {
    return view('acercade');
})->name('acercade');



// Autenticación

Auth::routes();



// Categorias

Route::resource('categoria', 'CategoriaController');

Route::get(('cancelar'), function(){
    return redirect()->route('categoria.index')->with('datos', 'Acción Cancelada');
})->name('cancelar');

Route::get('/categoria/{id}/confirmar','CategoriaController@confirmar')->name('categoria.confirmar');



// Productos

Route::resource('producto', 'ProductoController');

Route::get('/cancelar1', function(){
    return redirect()->route('producto.index')->with('datos', 'Accion Cancelada');
})->name('cancelar1');

Route::get('/producto/{codigoproducto}/confirmar','ProductoController@confirmar')->name('producto.confirmar');

Route::resource('cliente', 'ClienteController');

Route::get('obtenerCategoria/{codcategoria}', 'ClienteController@obtenerCategoria');



// Clientes

Route::resource('cliente', 'ClienteController');

Route::get(('cancelar3'), function(){
    return redirect()->route('cliente.index')->with('datos', 'Acción Cancelada');
})->name('cancelar3');

Route::get('/cliente/{id}/confirmar','ClienteController@confirmar')->name('cliente.confirmar');



// Unidades

Route::resource('unidad', 'UnidadController');

Route::get(('cancelar4'), function(){
    return redirect()->route('unidad.index')->with('datos', 'Acción Cancelada');
})->name('cancelar4');

Route::get('/unidad/{id}/confirmar','UnidadController@confirmar')->name('unidad.confirmar');



// Cabecera Ventas

Route::resource('cabeceraventa', 'CabeceraVentasController');

Route::get('EncontrarTipo/{codtipo}', 'CabeceraVentasController@PorTipo');

Route::get('EncontrarProducto/{codigoproducto}', 'CabeceraVentasController@ProductoCodigo');

Route::get(('cancelar5'), function(){
    return redirect()->route('cabeceraventa.index')->with('datos', 'Acción Cancelada');
})->name('cancelar5');



//Recibo

Route::get('/recibo/{codventa}','CabeceraVentasController@recibo')->name('recibo');