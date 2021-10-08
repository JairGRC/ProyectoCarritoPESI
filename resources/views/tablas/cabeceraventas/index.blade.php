@extends('layouts.plantilla')

@section('content')

<div class="container" style="padding:20px; background:white;">

    <h3>LISTADO DE VENTAS</h3>

    <a href="{{ route('cabeceraventa.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Registro</a>

    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0">
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
                <th scope="col">Codigo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Nro DOC</th>
                <th scope="col">Fecha</th>
                <th scope="col">RUC - DNI</th>
                <th scope="col">Cliente</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cabeceraventa as $itemcabeceraventa)
            <tr>
                <td>{{$itemcabeceraventa->codventa}}</td>
                <td>{{$itemcabeceraventa->tipo->descripcion}}</td>
                <td>{{$itemcabeceraventa->nrodoc}}</td>
                <td>{{$itemcabeceraventa->fechaventa}}</td>
                <td>{{$itemcabeceraventa->cliente->ruc_dni}}</td>
                <td>{{$itemcabeceraventa->cliente->nombres}}</td>
                <td>{{$itemcabeceraventa->total}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$cabeceraventa->links()}}
@endsection
