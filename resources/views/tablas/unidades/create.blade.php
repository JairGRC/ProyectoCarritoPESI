@extends('layouts.plantilla')

@section('content')

<div class="container" style="padding:20px; background:white;">
    <h1>Crear Registro</h1>
    <form method="POST" action="{{ route('unidad.store') }}">
        @csrf
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" placeholder="Ingrese Descripción de la Unidad">
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
