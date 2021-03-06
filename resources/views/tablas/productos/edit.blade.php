@extends('layouts.plantilla')

@section('content')

<div class="container" style="padding:20px; background:white;">
    <h1>Editar Registro</h1>
    <form method="POST" action="{{ route('producto.update',$producto->codigoproducto)}}">
        @method('put')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="id">Codigo</label>
                <input type="text" class="form-control" id="codigoproducto" name="codigoproducto" placeholder="Codigo" value="{{ $producto->codigoproducto}}" disabled>
            </div>
            <div class="form-group col-md-12">
                <label for="descripcion">Descripcion</label>
                <input type="text" autocomplete="off" class="form-control @error('descripcion') is-invalid @enderror" maxlength="30" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}">
                @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Categorias</label>
                <select class="form-control" id="codcategoria" name="codcategoria">
                    @foreach($categoria as $itemcategoria)
                    <option value="{{$itemcategoria->codcategoria}}" {{ $itemcategoria->codcategoria==$producto->codcategoria ? 'selected':'' }}>{{$itemcategoria->descripcion}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="codigounidad">Unidad</label>
                <select class="form-control" id="codigounidad" name="codigounidad">
                    @foreach($unidad as $itemunidad)
                    <option value="{{$itemunidad->codunidad}}" {{ $itemunidad->codunidad==$producto->codigounidad ? 'selected':'' }}>{{$itemunidad->descripcion}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="precio">Precio</label>
                <input type="text" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" style="text-align:right" value="{{$producto->precio}}" autocomplete="off" />
                @error('precio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="stock">Stock</label>

                <input type="number" class="form-control @error('stock') is-invalid @enderror" data-smk-type="decimal" id="stock" name="stock" style="text-align:right" value="{{$producto->stock}}" autocomplete="off">

                @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
        <a href="{{ route('cancelar1') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>

@endsection
