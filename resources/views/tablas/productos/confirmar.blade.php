@extends('layouts.plantilla')

@section('content')
<div class="container" style="padding:20px; background:white;">
    <div class="card-header">
        <h4><strong>Mantenedor de PRODUCTO</strong></h4>
    </div>
    <div class="card-body">
        <h5 class="card-title"><u>.::Eliminar Producto</u></h5>
        <p class="card-text">
            <p class="card-text">
                <strong>Código: </strong> {{$producto->codigoproducto}} <br>
                <strong>Descripción: </strong> {{$producto->descripcion}}
            </p>
            <h5 class="card-title">¿Desea eliminar?</h5><br>
            <form action="{{route('producto.destroy', $producto->codigoproducto)}}" method="POST">
                @method('DELETE')
                @csrf
                <div class="mx-auto">
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-check-square"></i>
                        Si
                    </button>
                    <a href="{{route('producto.index')}}" class="btn btn-sm btn-primary">
                        <i class="fas fa-times-circle"></i>
                        NO
                    </a>
                </div>
            </form>
        </p>
    </div>
</div>

@endsection
