@extends('layouts.plantilla')

@section('content')

<div class="container" style="padding:20px; background:white;">
    <h1>Editar Registro</h1>
    <form method="POST" action="{{ route("categoria.update", $categoria->codcategoria) }}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="">Código</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $categoria->codcategoria}}" disabled>
        </div>

        <div class="form-group">
            <label for="">Descripcion</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ $categoria->descripcion }}">
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
        <a href="{{ route('cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
    </form>
</div>

@endsection
