@extends('layouts.plantilla')

@section('content')

<div class="container" style="padding:20px; background:white;">
    <h1>¿Desea Eliminar la Unidad? Codigo : {{ $unidad->codunidad }} - Descripcion: {{ $unidad->descripcion }}</h1>
    <form method="POST" action="{{route('unidad.destroy', $unidad->codunidad)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i>SI</button>
        <a href="{{ route('cancelar4') }}" class="btn btn-primary"><i class="fas fa-times-circle"></i>NO</a>
    </form>
</div>

@endsection
