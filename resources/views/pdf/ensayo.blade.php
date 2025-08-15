<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            position: relative;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 13px;
            font-family: Arial;
        }

        .table-details {
            border-collapse: collapse;
        }

        .table-details th,
        .table-details td {
            border: 1px solid black;
            border-collapse: collapse;
            vertical-align: top;
        }

        .head-details {
            text-align: center;
            font-weight: bold;
            background-color: gray;
        }

        .table-details .currency-field {
            text-align: right
        }

        footer {
            position: fixed;
            bottom: -35px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

    </style>
</head>

<body>
    <footer>
            {!! $pie_pagina !!}
    </footer>
    <main>
        <table width="100%">
            <tr>
                <td width="100px">
                    <img src="{{ public_path('images\images\uni-logo-color.png') }}" width="100px">
                </td>
                <td>
                    <h1>UNIVERSIDAD NACIONAL DE INGENIERIA</h1>
                    <h3>RUC: 20169004359</h3>
                    <span>Facultad de Ingenieria Eléctrica y Electronica</span>
                    <br>
                    <span>Laboratorio N° 06 de Electricidad</span>
                </td>
            </tr>
        </table>
        <br>
        <table width="100%">
            <tr>
                <td width="35%"></td>
                <td style="text-align:center; background-color: #cccccc; padding-top: 10px;
                  padding-bottom: 10px; font-weight: bold; border: 2px solid black">
                    COTIZACIÓN <br>{{$valores['nro_cotizacion']}}
                </td>
                <td width="35%"></td>
            </tr>
        </table>
        <br>
        <span>{{$valores['fecha_actual']}}</span>
        <br>
        <table>
            <tr>
                <td width="150px">
                    <strong>SOLICITANTE</strong>
                </td>
                <td width="30px">:</td>
                <td>
                    <strong>{{$solicitante->SOLIC_Nombre}}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>RUC</strong>
                </td>
                <td>:</td>
                <td>
                    <strong>{{$solicitante->SOLIC_Ruc}}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>DIRECCIÓN</strong>
                </td>
                <td>:</td>
                <td>
                    <strong>{{$solicitante->SOLIC_Direccion}}</strong>
                </td>
            </tr>
        </table>
        <br>

        <table>
            <tr>
                <td width="150px">
                    <strong>CONTACTO</strong>
                </td>
                <td width="30px">:</td>
                <td>
                    <strong>{{$contacto->nombre_contacto}}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>TELEFONO</strong>
                </td>
                <td>:</td>
                <td>
                    <strong>{{$contacto->celular_contacto}}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>EMAIL</strong>
                </td>
                <td>:</td>
                <td>
                    <strong>{{$contacto->correo_contacto}}</strong>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <div>
            <strong>DESCRIPCIÓN DEL SERVICIO:</strong>
        </div>
        <table width="100%" class="table-details">
            <thead>
                <tr>
                    <td class="head-details" width="5%">ITEM</td>
                    <td class="head-details" width="50%">{{ !$es_capacitacion ? 'DESCRIPCIÓN' : 'CURSO' }}</td>
                    <td class="head-details" width="10%">{{ !$es_capacitacion ? 'CANT.' : 'CANTIDAD PARTICIPANTE' }}</td>
                    <td class="head-details" width="20%">{{ !$es_capacitacion ? 'PRECIO UNITARIO' : 'COSTO POR CURSO' }}</td>
                    <td class="head-details price" width="20%">{{ !$es_capacitacion ? 'COSTO TOTAL' : 'PRECIO TOTAL' }}</td>
                </tr>
            </thead>

            <tbody>
                @if(!$es_capacitacion)
                @foreach($cotizaciones ?? '' as $key => $value)
                <tr>
                    <td style="text-align:center">{{$key+1}}</td>
                    <td><strong>{{ $value['CODEC_Descripcion_Equipo'] }}</strong>
                        @foreach($value['pruebas'] ?? '' as $key2 => $value2)
                            <br>
                            {{$value2['Descripcion_Prueba']}}
                        @endforeach
                    </td>
                    <td style="text-align:center">{{$value['CODEC_Cantidad']}}</td>
                    <td class="currency-field">S/. {{$value['CODEC_Costo']}}</td>
                    <td class="currency-field">S/. {{$value['CODEC_SubTotal']}}</td>
                </tr>
                @endforeach
                @else
                @foreach($cotizaciones ?? '' as $key => $value)
                <tr>
                    <td style="text-align:center">{{$key+1}}</td>
                    <td>
                        <strong>{{$value['nombre_curso']}}</strong>
                        <br>{{ $value['COCAC_Horario_Tentativo_Curso'] }}
                        <br>{{ $value['lugar_capacitacion'] }}
                        <br>{{ $value['COCAC_Detalle_Curso_Cotizar'] }}
                    </td>
                    <td style="text-align:center">{{$value['COCAC_Cantidad']}}</td>
                    <td class="currency-field">S/. {{$value['COCAC_Costo_Curso_Original']}}</td>
                    <td class="currency-field">S/. {{$value['COCAC_SubTotal']}}</td>
                </tr>
                @endforeach
                @endif
                @if (!$es_capacitacion)
                <tr>
                    <td colspan="3" style="border:0px"></td>
                    <td>SUBTOTAL</td>
                    <td class="currency-field">
                        S/. {{$valores['subtotal']}}
                    </td>
                </tr>    
                @endif
                
                @if($valores['descuento'] > 0)
                <tr>
                    <td colspan="3" style="border:0px"></td>
                    <td>
                        <b>DESCUENTO</b>
                    </td>
                    <td class="currency-field">{{$valores['descuento']}}%</td>
                </tr>
                <tr>
                    <td colspan="3" style="border:0px"></td>
                    <td>
                        <b>SUB TOTAL DESCUENTO</b>
                    </td>
                    <td class="currency-field">S/. {{$valores['descuento_importe']}}</td>
                </tr>
                @endif
                @if(!$es_capacitacion)
                <tr>
                    <td colspan="3" style="border:0px"></td>
                    <td>IGV 18%</td>
                    <td class="currency-field">S/. {{$valores['igv']}}</td>
                </tr>    
                @endif
                

                <tr>
                    <td colspan="3" style="border:0px"></td>
                    <td>
                        <b>TOTAL</b>
                    </td>
                    <td class="currency-field">
                        S/. {{$valores['total']}}
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <h3>DESCRIPCIÓN DEL SERVICIO:</h3>
        <br>
        <strong>S/. {{$valores['total']}}</strong> Son {{ $valores['moneda_traducida'] }} <br>
        <table width="100%" style="align-self: center;">
            <tr>
                <td width="20%" rowspan="2"></td>
                <td height="100px"></td>
                <td width="20%" rowspan="2"></td>
            </tr>
            <tr>
                <td style="border-top:1px solid black; text-align:center;">
                    <span>{{$nombre_jefe}}</span>
                    <br>
                    <span>Jefe del Laboratorio de Electricidad</span>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <table width="100%" class="table-details">
            <thead>
                <tr>
                    <th class="head-details">{{$titulo_datos_cta}}</th>
                    <td style="border:0px"></td>
                </tr>
            </thead>

            <tbody>
                @forelse($datos_cta as $item=>$dato)
                <tr>
                    <td width="80%">
                        {{$dato->valor}}
                    </td>
                    <td style="border:0px">
                        @php
                            if($dato->valor_adicional_1 != null && is_numeric($dato->valor_adicional_1)){
                                echo 'S/.' . number_format(floatval($dato->valor_adicional_1) * floatval($valores['total_sin_formato']),2);
                            }
                        @endphp
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        <p>{{ $texto_detraccion }}</p>
    </main>

</body>

</html>
