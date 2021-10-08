@extends('layouts.plantilla')

@section('content')

<div class="container" style="padding:20px; background:white;">
    <h1>Crear Registro</h1>
    <form method="POST" action="{{ route('cliente.store') }}">
        @csrf
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" placeholder="Ingrese Nombres">
            @error('nombres')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" placeholder="Ingrese Dirección">
            @error('direccion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="ruc_dni">RUC - DNI</label>
            <input type="text" class="form-control @error('ruc_dni') is-invalid @enderror" id="ruc_dni" name="ruc_dni" placeholder="Ingrese RUC o DNI">
            @error('ruc_dni')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ingrese email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
        <a href="{{ route('cancelar3') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>

    </form>
</div>

<!--
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script src="/SeleccionAnidad/seleccionFacultades.js"></script>
-->

@endsection
