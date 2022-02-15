<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table style="margin: 0 auto;" cellspacing="5" cellpadding="40">
        <tr>
            <td>
                <p><b>Concepto: </b>{{$cuota->concepto}}<br>
                <b>Fecha emisión: </b>{{$cuota->f_emision}}<br>
                <b>Importe: </b>{{$cuota->importe}}<br>
                <b>Pagada: </b>{{$cuota->pagada}}<br>
                <b>Fecha pago: </b>{{$cuota->f_pago}}<br>
                <b>Notas: </b>{{$cuota->notas}}<br>
                <b>Nombre cliente: </b>{{$cuota->cliente->nombre}}</p>

            </td>
            <td>


            </td>
            <td><p><b>Concepto: </b>{{$cuota->concepto}}<br>
                <b>Fecha emisión: </b>{{$cuota->f_emision}}<br>
                <b>Importe: </b>{{$cuota->importe}}<br>
                <b>Pagada: </b>{{$cuota->pagada}}<br>
                <b>Fecha pago: </b>{{$cuota->f_pago}}<br>
                <b>Notas: </b>{{$cuota->notas}}<br>
                <b>Nombre cliente: </b>{{$cuota->cliente->nombre}}</p></td>
        </tr>
    </table>

    {{-- DATOS CUOTA --}}
    <table style="width:100%; border: 1px solid black;">
        <tr>
            <td><p><b>Concepto</b></p></td>
            <td><p><b>Fecha emisión</b></p></td>
            <td><p><b>Importe</b></p></td>
            <td><p><b>Pagada</b></p></td>
            <td><p><b>Fecha pago</b></p></td>
            <td><p><b>Notas</b></p></td>
            <td><p><b>Nombre cliente</b></p></td>
        </tr>
        <tr>
            <td>{{$cuota->concepto}}</td>
            <td>{{$cuota->f_emision}}</td>
            <td>{{$cuota->importe}}</td>
            <td>{{$cuota->opcionesPagado()}}</td>
            <td>{{date('d-m-Y', strtotime($cuota->f_pago))}}</td>
            <td>{{$cuota->notas}}</td>
            <td>{{$cuota->cliente->nombre}}</td>
        </tr>
    </table>
</body>
</html>
