@extends('layouts.plantilla')

@section('content')

<div class="container" style="padding:20px; background:white;">
    <h1>Crear Registro</h1>
    <form method="POST" action="{{ route('producto.store') }}">
        @csrf
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" placeholder="Ingrese descripcion">
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="codcategoria" name="codcategoria">
                @foreach($categoria as $itemcategoria)
                <option value="{{$itemcategoria['codcategoria']}}">{{$itemcategoria['descripcion']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="categoria">Unidades</label>
            <select class="form-control" id="codigounidad" name="codigounidad">
                @foreach($unidad as $itemunidad)
                <option value="{{$itemunidad['codunidad']}}">{{$itemunidad['descripcion']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descripcion">Precio</label>
            <input type="text" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" placeholder="Ingrese Precio">
            @error('precio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcion">Stock</label>
            <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" placeholder="Ingrese Stock">
            @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
        <a href="{{ route('cancelar1') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
    </form>
</div>

@endsection
