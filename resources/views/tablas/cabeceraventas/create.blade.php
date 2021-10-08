@extends('layouts.plantilla')

@section('estilos')
<link href="/plantilla/lib/jquery.steps/jquery.steps.css" rel="stylesheet">
<link rel="stylesheet" href="/calendario/css/bootstrap-datepicker.standalone.css">
<link rel="stylesheet" href="/calendario/css/bootstrap-select.min.css">
<link rel="stylesheet" href="/select2/bootstrap-select.min.css">
<link href="/plantilla/lib/highlightjs/github.css" rel="stylesheet">
@endsection

@section('content')

<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
        <h2 style="padding-bottom: 25px;">REGISTRAR VENTA</h2>

        <form method="POST" action=" {{ route('cabeceraventa.store') }} " style="background: white;">
            @csrf
            <div id="wizard1">
                <h3>Agregar Productos</h3>
                <section>
                    <div style="height: 20px;"></div>
                    <div class="row">
                        <!-- FECHA -->
                        <div class="col-md-1">
                            <label for="">Fecha</label>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="input-group date form_date " data-date-format="dd/mm/yyyy" data-provide="datepicker">
                                    <input type="text" class="form-control" name="fecha" id="fecha" value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" style="text-align:center;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary date-set" type="button"><i class="fa fa-calendar"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1">
                        </div>

                        <!-- TIPO -->
                        <div class="col-md-1">
                            <label for="">Tipo</label>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="seltipo" name="seltipo" onchange="mostrarTipo()">
                                @foreach($tipo as $itemTipo)
                                <option selected value="{{$itemTipo['codtipo']}}">{{$itemTipo['descripcion']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-1">
                        </div>

                        <!-- NRO DOCUMENTO -->
                        <div class="col-md-1">
                            <label for="">No Doc. :</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="nrodoc" id="nrodoc" value="{{ $parametros->serie.$parametros->numeracion }}" readonly="readonly">
                        </div>
                    </div>

                    <div class="row">

                        <!-- CLIENTE -->
                        <div class="col-md-1">
                            <label for="">Cliente </label>
                        </div>
                        <div class="col-md-7">
                            <select class="form-control select2 select2-hidden-accessible selectpicker" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="codcliente" name="codcliente" data-live-search="true" onchange="mostrarCliente()">
                                <option value="" selected>- Seleccione Cliente -</option>
                                @foreach($cliente as $itemcliente)
                                <option value="{{ $itemcliente->codcliente }}_{{ $itemcliente->ruc_dni }}_{{ $itemcliente->direccion }}_{{ $itemcliente->nombres }}_{{ $itemcliente->email }}">{{ $itemcliente->nombres }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-1">
                        </div>

                        <!-- RUC DNI -->
                        <div class="col-md-1">
                            <label for="">RUC/DNI</label>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="text" class="form-control" name="ruc_dni" id="ruc_dni" readonly="readonly">
                            </div>
                        </div>
                    </div>

                    <div class="row  pt-2">
                        <!-- DIRECCIÓN -->
                        <div class="col-md-1">
                            <label for="">Dirección </label>
                        </div>
                        <div class="col-md-11">
                            <input type="text" class="form-control" name="direccion" id="direccion" readonly="readonly">
                        </div>
                    </div>

                    <div class="row pt-3">
                        <!-- PRODUCTO -->
                        <div class="col-md-1">
                            <label for="codigoproducto">Producto </label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control select2 select2-hidden-accessible selectpicker" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="codigoproducto" name="codigoproducto" data-live-search="true" onchange="mostrarProducto()">
                                <option value="0" selected>- Seleccione Producto -</option>
                                @foreach($producto as $itemproducto)
                                <option value="{{ $itemproducto->codigoproducto }}">{{ $itemproducto->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- UNIDAD -->
                        <div class="col-md-1" style="text-align:right;">
                            <label for="">Unidad :</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="unidad" id="unidad" readonly="readonly">
                        </div>
                    </div>

                    <div class="row pt-3">

                        <div class="col-md-1">
                        </div>

                        <!-- PRECIO -->
                        <div class="col-md-1">
                            <label for="">Precio </label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="precio" id="precio" readonly="readonly">
                        </div>

                        <!-- CANTIDAD -->
                        <div class="col-md-1">
                            <label for="">Cantidad </label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="cantidad" id="cantidad">
                        </div>

                        <!-- BOTÓN AGREGAR CARRITO  -->
                        <div class="col-md-3">
                            <button type="button" id="btnadddet" name="btnadddet" class="btn btn-success" onclick="agregarDetalle()"><i class="fa fa-shopping-cart"></i> Agregar al carrito</button>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="stock" id="stock" hidden>
                        </div>

                        <input id="totalCarrito" name="totalCarrito" type="hidden" value="0">

                    </div>

                    <div class="col-md-12 pt-3">
                        <div class="table-responsive">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover" style='background-color:#FFFFFF;'>
                                <thead class="thead-default" style="background-color:#3c8dbc;color: #fff;">
                                    <th width="10" class="text-center">OPCIONES</th>
                                    <th class="text-center">CODIGO</th>
                                    <th>DESCRIPCIÓN</th>
                                    <th>UNIDAD</th>
                                    <th class="text-center">CANTIDAD</th>
                                    <th class="text-center">P.VENTA</th>
                                    <th>IMPORTE</th>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-2">
                                <label for="">Total : </label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control text-right" name="total" id="total" readonly="readonly">
                            </div>
                        </div>

                    </div>
                </section>

                <h3>Pago</h3>
                <section>
                    <div class="container" style="padding-top:20px;">
                        <h3>Datos Personales</h3>
                        <div class="col-md-12 col-sm-12 row" style="padding-top:15px;">
                            <div class="col-md-1" style="text-align:right;">
                                <label for="">Cliente: </label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="nombreCliente" id="nombreCliente" readonly="readonly">
                            </div>

                            <div class="col-md-1" style="text-align:right;">
                                <label for="email">Email: </label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="email" id="email" readonly="readonly">
                            </div>

                            <div class="col-md-1" style="text-align:right;">
                                <label for="dniCliente">DNI: </label>
                            </div>
                            <div class="col-md-2" style="padding-bottom:50px;">
                                <input type="text" class="form-control" name="dniCliente" id="dniCliente" readonly="readonly">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-5">

                                <h3 stle="padding-buttom: 10px;">Método de Pago</h3>

                                <div class="col-md-12 row" style="padding-top:25px;">
                                    <input id="radioPago" name="radioPago" type="hidden" value="">
                                    <div class="col-lg-6">
                                        <label class="rdiobox row" style="width:100%">
                                            <input name="rdio" type="radio" style="margin:0%;" id="efectivo" onclick="Efectivo()">
                                            <span style="width: 20px;">Efectivo</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="rdiobox row" style="width:100%">
                                            <input name="rdio" type="radio" style="margin:0%;" id="tarjeta" onclick="Tarjeta()">
                                            <span style="width: 20px;">Tarjeta</span>
                                        </label>
                                    </div>
                                </div>

                                <div id="metodoPago">
                                </div>

                                <div class="col-md-8 text-center" style="padding-top:40px;">
                                    <div id="guardar">
                                        <div class="form-group">
                                            <button class="btn btn-primary" id="btnRegistrar" onclick="return ValidarCampos();" data-loading-text="<i class='fa a-spinner fa-spin'></i> Registrando">
                                                <i class='fa fa-save'></i> Registrar</button>

                                            <a href=" {{route('cancelar5')}} " class='btn btn-danger'><i class='fa fa-ban'></i> Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 col-sm-7">
                                <h3>Resumen de compras</h3>
                                <div style="padding-top:30px;">
                                    <table id="resumen" class="table" style="background:white; color:black;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Códgio</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col" style="text-align: center;">Cantidad</th>
                                                <th scope="col" style="text-align: center;">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2" style="vertical-align:middle;">
                                        <label for="">TOTAL : </label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control text-right" name="totalPago" id="totalPago" readonly="readonly">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </section>
        </form>
    </div>
</div>
</div>

@endsection


@section('script')
<script src="/calendario/js/bootstrap-datepicker.min.js"></script>
<script src="/calendario/locales/bootstrap-datepicker.es.min.js"></script>
<script src="/select2/bootstrap-select.min.js"></script>
<script src="/plantilla/lib/highlightjs/highlight.pack.js"></script>
<script src="/plantilla/lib/jquery.steps/jquery.steps.js"></script>
<script src="/plantilla/lib/parsleyjs/parsley.js"></script>
<script src="/plantilla/js/carrito.js"></script>
@endsection
