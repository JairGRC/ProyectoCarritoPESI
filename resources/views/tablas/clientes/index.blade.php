@extends('layouts.plantilla')

@section('content')

<div class="container" style="padding:20px; background:white;">

    <h3>LISTADO DE CLIENTES</h3>

    <nav class="navbar float-left">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar por descripcion" aria-label="Search" id="buscarpor" name="buscarpor" value="{{$buscarpor}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        <p>&nbsp;&nbsp;&nbsp;</p>
        <a href="{{route('cliente.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Registro</a>
    </nav>

    @if (session('datos'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" roles="alert">
        {{ session('datos') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <br>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Cod</th>
                <th scope="col">Nombres</th>
                <th scope="col">Dirección</th>
                <th scope="col">RUC - DNI</th>
                <th scope="col">Email</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cliente as $itemcliente)
            <tr>
                <td>{{$itemcliente->codcliente}}</td>
                <td>{{$itemcliente->nombres}}</td>
                <td>{{$itemcliente->direccion}}</td>
                <td>{{$itemcliente->ruc_dni}}</td>
                <td>{{$itemcliente->email}}</td>
                <td>
                    <a href="{{ route('cliente.edit', $itemcliente->codcliente)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a>
                    <a href="{{ route('cliente.confirmar', $itemcliente->codcliente)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$cliente->links()}}

@endsection
