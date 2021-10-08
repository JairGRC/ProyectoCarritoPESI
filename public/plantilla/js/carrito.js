    var cont = 0;
    var total = 0;
    var detalleventa = [];
    var subtotal = [];
    var controlproducto = [];

    $(document).ready(function() {
        $('#seltipo').change(function() {
            mostrarTipo();
        });

        $('#wizard1').steps({
            headerTag: 'h3'
            , bodyTag: 'section'
            , autoFocus: true
            , titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
        });
    });

    $('#codcliente').change(function() {
        mostrarCliente();
    });

    $('#codigoproducto').change(function() {
        mostrarProducto();
    });

    $('#btnadddet').click(function() {
        agregarDetalle();
    });

    function mostrarTipo() {
        codigotipo = $("#seltipo").val();
        $.get('/EncontrarTipo/' + codigotipo, function(data) {
            $('input[name = nrodoc]').val(data[0].serie + data[0].numeracion);
        });
    }

    function mostrarCliente() {
        datosCliente = document.getElementById('codcliente').value.split('_');
        $('#ruc_dni').val(datosCliente[1]);
        $('#direccion').val(datosCliente[2]);
        $('#nombreCliente').val(datosCliente[3]);
        $('#email').val(datosCliente[4]);
        $('#dniCliente').val(datosCliente[1]);
    }

    function mostrarProducto() {
        codigoproducto = $("#codigoproducto").val();
        $.get('/EncontrarProducto/' + codigoproducto, function(data) {
            $('input[name=codigoproducto]').val(data[0].codigoproducto);
            $('input[name=unidad]').val(data[0].unidad);
            $('input[name=precio]').val(number_format(data[0].precio, 2));
            $('input[name=stock]').val(data[0].stock);
        });
    }

    function mostrarMensajeError(mensaje) {
        $(".alert").css('display', 'block');
        $(".alert").removeClass("hidden");
        $(".alert").addClass("alert-danger");
        $(".alert").html("<button type='button' class='close' data-close='alert'>×</button>" +
            "<span><b>Error!</b> " + mensaje + ".</span>");
        $('.alert').delay(5000).hide(400);
    }


    function agregarDetalle() {
        ruc_dni = $("#ruc_dni").val();
        if (ruc_dni == '') {
            mostrarMensajeError("Por favor seleccione el Cliente");
            return false;
        }
        descripcion = $('#codigoproducto option:selected').text();
        if (descripcion == 'Seleccione Producto') {
            mostrarMensajeError("Por favor seleccione el Producto");
            return false;
        }
        let cantidad = $("#cantidad").val();
        let stock = $("#stock").val();
        if (cantidad == '' || Number(cantidad) == 0 || cantidad == null) {
            mostrarMensajeError("Por favor ingrese cantidad del producto");
            return false;
        }
        if (cantidad <= 0) {
            mostrarMensajeError("Por favor debe escribir cantidad del producto mayor a 0");
            return false;
        }
        if (Number(cantidad) > Number(stock)) {
            mostrarMensajeError("No se tiene tal cantidad de producto solo hay " + stock);
            return false;
        }
        pventa = $("#precio").val();
        if (pventa == '' || pventa == 0) {
            mostrarMensajeError("Por favor ingrese precio de venta del producto");
            return false;
        }

        /* Buscar que codigo de producto no se repita  */
        cod_producto = $("#codigoproducto").val();
        var i = 0;
        var band = false;
        while (i < cont) {
            if (controlproducto[i] == cod_producto) {
                band = true;
            }
            i = i + 1;
        }
        if (band == true) {
            mostrarMensajeError("No puede volver a vender el mismo producto");
            return false;
        } else {
            unidad = $("#unidad").val();
            subtotal[cont] = cantidad * pventa;
            controlproducto[cont] = cod_producto;

            total = parseFloat($("#totalCarrito").val());
            total = total + subtotal[cont];
            $("#totalCarrito").val(total);

            var fila = '<tr class="selected" id="fila' + cont + '"><td style="text-align:center; vertical-align:middle;"><button type="button" class="btn btn-danger btn-xs" onclick="eliminarDetalle(' + cod_producto + ',' + cont + ');"><i class="fa fa-times" ></i></button></td><td style="text-align:center; vertical-align:middle;"><input type="text" name="cod_producto[]" value="' + cod_producto + '" readonly style="width:50px; text-align:center; border:0;"></td><td style="vertical-align:middle;">' + descripcion + '</td><td style="vertical-align:middle;"><input type="text" name="unidad[]" value="' + unidad + '" style="width:140px; text-align:left; border:0;" disabled></td><td style="text-align:center; vertical-align:middle;"><input type="number" name="cantidad[]" value="' + cantidad + '" style="width:80px; text-align:center; border:0;" readonly></td><td  style="text-align:center; vertical-align:middle;"><input type="number" name="pventa[]" value="' + pventa + '" style="width:80px; text-align:center; border:0;" readonly></td><td style="text-align:right; vertical-align:middle;">' + number_format(subtotal[cont], 2) + '</td></tr>';
            $('#detalles').append(fila);
            var fila2 = '<tr class="selected" id="fila2' + cont + '"><td style="vertical-align:middle;">' + cod_producto + '</td><td style="vertical-align:middle;">' + descripcion + '</td><td style="text-align:center; vertical-align:middle;">' + cantidad + '</td><td style="text-align:right; vertical-align:middle;">' + number_format(subtotal[cont], 2) + '</td></tr>';
            $('#resumen').append(fila2);
            detalleventa.push({
                codigo: cod_producto
                , unidad: unidad
                , cantidad: cantidad
                , pventa: pventa
                , subtotal: subtotal
            });
            cont++;
            limpiar();
        }
        $('#total').val(number_format(total, 2));
        $('#totalPago').val(number_format(total, 2));
    }

    function number_format(amount, decimals) {
        amount += ''; // por si pasan un numero en vez de un string
        amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto
        decimals = decimals || 0; // por si la variable no fue fue pasada
        // si no es un numero o es igual a cero retorno el mismo cero
        if (isNaN(amount) || amount === 0)
            return parseFloat(0).toFixed(decimals);
        // si es mayor o menor que cero retorno el valor formateado como numero
        amount = '' + amount.toFixed(decimals);
        var amount_parts = amount.split('.')
            , regexp = /(\d+)(\d{3})/;
        while (regexp.test(amount_parts[0]))
            amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
        return amount_parts.join('.');
    }

    function limpiar() {
        $("#cantidad").val('');
        $("#precio").val('');
        $("#unidad").val('');
        $("#codigoproducto").val(0);
    }

    function eliminarDetalle(codigo, index) {
        total = total - subtotal[index];
        tam = detalleventa.length;
        var i = 0;
        var pos;
        while (i < tam) {
            if (detalleventa[i].codigo == codigo) {
                pos = i;
                break;
            }
            i = i + 1;
        }
        detalleventa.splice(pos, 1);
        $('#fila' + index).remove();
        $('#fila2' + index).remove();
        controlproducto[index] = "";
        $('#total').val(number_format(total, 2));

        total = parseFloat($("#totalCarrito").val());
        total = total - subtotal[index];
        $("#totalCarrito").val(total);
        $('#totalPago').val(number_format(total, 2));
    }

    function Efectivo() {
        $('#metodoPago').empty();
        var contenido = '<div style="padding-top: 10px;"><div class="col-md-1"><label for="totalPago">TOTAL: </label></div><div class="col-md-9"><input type="text" class="form-control" name="totalPago" id="totalPago" value="' + total + '" readonly="readonly"></div><div class="col-md-1"><label for="montoPago">Monto: </label></div><div class="col-md-9"><input type="text" class="form-control" name="montoPago" id="montoPago"></div></div>';
        $('#metodoPago').append(contenido);
        $('#radioPago').val(1);
    }

    function Tarjeta() {
        $('#metodoPago').empty();
        var contenido = ' <div style="padding-top: 10px;"><div class="col-md-9"><label for="titular">Nombre del titular de la tarjeta: </label></div><div class="col-md-9"><input type="text" class="form-control" name="titular" id="titular"></div><div class="col-md-3"><label for="nroTarjeta">Nro Tarjeta: </label></div><div class="col-md-9"><input type="text" class="form-control" name="nroTarjeta" id="nroTarjeta"></div><div class="col-md-12 row"><div class=" form-group col-md-3"><label for="mes">Mes: </label><input id="mes" class="form-control" type="mes" name="mes"></div><div class=" form-group col-md-3"><label for="anio">Año: </label><input id="anio" class="form-control" type="anio" name="anio"></div><div class=" form-group col-md-3"><label for="cvv">CVV: </label> <input id="cvv" class="form-control" type="cvv" name="cvv"></div></div></div>';
        $('#metodoPago').append(contenido);
        $('#radioPago').val(2);
    }

    function ValidarCampos() {
        var metodoPago;
        var montopago, titular, nroTarjeta, mes, anio, cvv;
        var fecha = new Date();
        montopago = parseFloat($('#montoPago').val());
        titular = $('#titular').val();
        nroTarjeta = $('#nroTarjeta').val();
        mes = $('#mes').val();
        anio = $('#anio').val();
        cvv = $('#cvv').val();

        metodoPago = $('#radioPago').val();
        if(metodoPago != null && metodoPago != 0){
            if(metodoPago == 1){
                if(montopago != 0 || montopago != null || montopago != ''){
                    total = parseFloat($("#totalCarrito").val());
                    if(total <= montopago){
                        return true;
                    } else {
                        alert('Ingrese un Monto mayor al Total');
                        return false;
                    }
                } else {
                    alert('Ingrese el Monto');
                    return false;
                }

            } else if (metodoPago == 2) {
                if(titular != '' && titular != null){
                    if(titular.length >= 3) {
                        if(nroTarjeta != null && nroTarjeta != '' ){
                            if(nroTarjeta.length === 16){
                                if(isNaN(nroTarjeta) == false){
                                    if( mes != null && mes != '' ) {
                                        if(mes.length === 2 || mes.length === 1){
                                            if(isNaN(mes) == false){
                                                if(parseInt(mes) > 0 && parseInt(mes) <13){
                                                    if(anio != null && anio != ''){
                                                        if(anio.length === 4){
                                                            if(isNaN(anio) == false){
                                                                if(parseInt(anio) >= parseInt(fecha. getFullYear())){
                                                                    if(cvv != null && cvv != ''){
                                                                        if(cvv.length === 3){
                                                                            if(isNaN(cvv) == false){
                                                                                return true;
                                                                            } else {
                                                                                alert('CVV no válido');
                                                                                return false;
                                                                            }
                                                                        } else {
                                                                            alert('CVV no válido');
                                                                            return false;
                                                                        }
                                                                    } else {
                                                                        alert('Ingrese el CVV');
                                                                        return false;
                                                                    }
                                                                } else{
                                                                    alert('Año no válido o Tarjeta vencida');
                                                                    return false;
                                                                }
                                                            } else{
                                                                alert('Año no válido');
                                                                return false;
                                                            }
                                                        } else {
                                                            alert('Año no válido');
                                                            return false;
                                                        }
                                                    } else {
                                                        alert('Ingrese el Año');
                                                        return false;
                                                    }
                                                }else{
                                                    alert('Mes no válido');
                                                    return false;
                                                }
                                            } else {
                                                alert('Mes no válido');
                                                return false;
                                            }
                                        } else {
                                            alert('Mes no válido');
                                            return false;
                                        }
                                    } else {
                                        alert('Ingrese el Mes');
                                        return false;
                                    }
                                } else {
                                    alert('Ingrese sólo números para el Nro Tarjeta');
                                return false;
                                }
                            } else {
                                alert('Ingrese 16 dígitos para la número de la tarjeta');
                                return false;
                            }
                        } else {
                            alert('Ingrese el número de la tarjeta');
                        return false;
                        }
                    } else {
                        alert('Ingrese un nombre con más de 3 caracteres');
                        return false;
                    }
                } else {
                    alert('Ingrese el nombre del Titular de la Tarjeta');
                    return false;
                }

            } else {
                alert('Seleccione el método de pago');
                return false;
            }
        } else {
            alert('Seleccione el método de pago');
            return false;
        }
    }

