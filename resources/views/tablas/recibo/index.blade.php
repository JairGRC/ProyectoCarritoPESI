@extends('layouts.plantilla')

@section('content')

<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40" style="text-align:center;">
        <h2>RECIBO</h2>
    </div>

    <div class="alert alert-success pd-y-20" role="alert" style="padding-bottom: 20px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <div class="d-sm-flex align-items-center justify-content-start">
            <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
            <div class="mg-t-20 mg-sm-t-0">
                <h5 class="mg-b-2 tx-success">Guardado! Se ha registrado la venta satisfactoriamente.</h5>
                <p class="mg-b-0 tx-gray">Puedes imprimir el recibo</p>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center" style="padding-bottom:25px;">
        <div class="d-md-flex pd-y-20 pd-md-y-0 col-md-2 col-sm-2">
            <button class="btn btn-outline-primary btn-block mg-b-10" onclick="javascript:imprimir(imprimir);">Imprimir</button>
        </div>
    </div>

    <div id="imprimir">
        @include('tablas.recibo.recibo')
    </div>

    <script>
        function imprimir(imprimir) {
            var printContents = document.getElementById('imprimir').innerHTML;
            w = window.open();
            w.document.write(printContents);
            w.document.close(); // necessary for IE >= 10
            w.focus(); // necessary for IE >= 10
            w.print();
            w.close();
            return true;
        }

    </script>

</div>

@endsection
