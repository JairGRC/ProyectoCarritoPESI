<div class=WordSection1>

    <div style='text-align:center'>
        <b><span style='font-size:18.0pt;line-height:107%'>GRUPO 10</span></b>
    </div>

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <span style='font-size:10.0pt'>SUPERMERCADO PERUANO</span>
    </div>

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <span style='font-size:10.0pt'>RUC: 10046251985</span>
    </div>

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <span style='font-size:10.0pt'>Av. Juan Pablo II</span>
    </div>

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <span style='font-size:10.0pt'>Trujillo - Trujillo</span>
    </div>
    <br />

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <span style='font-size:10.0pt'>BOLETA DE VENTA ELECTRÓNICA</span>
    </div>

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <b><span style='font-size:12.0pt'>{{ $venta->codventa }}</span></b>
    </div>
    <br />

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <span style='font-size:10.0pt'>FECHA DE EMISION: {{ $venta->fechaventa }}</span>
    </div>

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <span style='font-size:10.0pt'>TIPO MONEDA: SOLES</span>
    </div>

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <span style='font-size:10.0pt'>CLIENTE: {{ $venta->cliente->nombres }}</span>
    </div>

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <span style='font-size:10.0pt'>DNI: {{ $venta->cliente->ruc_dni }}</span>
    </div>
    <br />

    <div style='margin-bottom:0cm; text-align:center; line-height:normal; font-size:9.0pt; justify-content:center;'>
        <table style="margin: 0 auto; justify-content:center; font-size:9.5pt; width:230px;">
            <thead>
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">CANT</th>
                    <th scope="col">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venta->detalleVentas as $itemVenta)
                <tr>
                    <td>{{ $itemVenta->codigoproducto }}</td>
                    <td>{{ $itemVenta->descripcion }}</td>
                    <td style="text-align:center;">{{ $itemVenta->cantidad }}</td>
                    <td style="text-align:right;">{{ number_format($itemVenta->precio, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br/>

    <div style='margin-bottom:0cm; line-height:normal'>
        <table style="margin: 0 auto; font-size:10.0pt; width:230px;">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>OP. GRAVADA</td>
                    <td style="text-align:right;">{{ $venta->subtotal }}</td>
                </tr>
                <tr>
                    <td>IGV</td>
                    <td style="text-align:right;">{{ $venta->igv }}</td>
                </tr>
                <tr>
                    <td>IMPORTE TOTAL</td>
                    <td style="text-align:right;">{{ number_format($venta->total, 2) }}</td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td><b>MEDIO DE PAGO</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td>PAGO: {{ $pago->idtipopago == 1 ? 'EFECTIVO' : 'TARJETA' }}</td>
                    <td style="text-align:right;">{{ $pago->idtipopago == 1 ? number_format($pago->monto, 2) : number_format($venta->total, 2) }}</td>
                </tr>
                <tr>
                    <td>CAMBIO: EFECTIVO</td>
                    <td style="text-align:right;">{{ $pago->idtipopago == 1 ? number_format($pago->vuelto, 2) : '0.00' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style='margin-bottom:0cm;text-align:center; line-height:normal'>
        <span style='font-size:10.0pt'>******************************************</span>
    </div>

</div>

<script>

</script>
