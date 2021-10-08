@extends('layouts.plantilla')

@section('content')

<div class="container" style="padding:20px; background:white;">
    <h1>Editar Registro</h1>
    <form method="POST" action="{{ route('unidad.update', $unidad->codunidad) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Código</label>
            <input type="text" class="form-control" id="codestudiante" name="codestudiante" value="{{ $unidad->codunidad}}" disabled>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" placeholder="Ingrese Descripción de la Unidad" value="{{ $unidad->descripcion }}">
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
        <a href="{{ route('cancelar4') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>

    </form>
</div>

<!--
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script src="/SeleccionAnidad/seleccionFacultades.js"></script>
-->

@endsection
