@extends('layouts.plantilla')

@section('content')


<div class="container" style="padding:20px; background:white;">

    <h1>LISTADO DE PRODUCTOS</h1>

    <a href="{{route('producto.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Registro</a>

    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar por descripcion" aria-label="Search" id="buscarpor" name="buscarpor" value="{{$buscarpor}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>

    @if (session('datos'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" roles="alert">
        {{ session('datos') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Descripción</th>
                <th scope="col">Categoria</th>
                <th scope="col">Unidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($producto as $itemproducto)
            <tr>
                <td>{{$itemproducto->codigoproducto}}</td>
                <td>{{$itemproducto->descripcion}}</td>
                <td>{{$itemproducto->categoria->descripcion}}</td>
                <td>{{$itemproducto->unidad->descripcion}}</td>
                <td>{{$itemproducto->precio}}</td>
                <td>{{$itemproducto->stock}}</td>
                <td>
                    <a href="{{ route('producto.edit',$itemproducto->codigoproducto) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="{{ route('producto.confirmar',$itemproducto->codigoproducto) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $producto->links() }}
</div>


@endsection
