<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuota {{ $cuota->cliente->nombre }} - SiempreColgados</title>

    <style>
        .table,
        .table td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        .p {
            border: 1px solid black;
            width: 100%;
        }

    </style>
</head>

<body>

    <table class="p" cellspacing="40" cellpadding="20">
        <tr>
            <td>
                <p>SiempreColgados<br>
                    Av. Santa Marta, s/n<br>
                    21005 Huelva<br>
                    959318164<br>
                    siemprecolgados@gmail.com
            </td>
            <td>


            </td>
            <td>
                <p>{{ $cuota->cliente->nombre }}<br>
                    {{ $cuota->cliente->telefono }}<br>
                    {{ $cuota->cliente->email }}</p>
            </td>
        </tr>
    </table><br>

    {{-- DATOS CUOTA --}}
    <table class="table">
        <tr>
            <td>
                <p><b>Concepto</b></p>
            </td>
            <td>
                <p><b>Fecha emisión</b></p>
            </td>
            <td>
                <p><b>Importe</b></p>
            </td>
            <td>
                <p><b>Pagada</b></p>
            </td>
            <td>
                <p><b>Fecha pago</b></p>
            </td>
            <td>
                <p><b>Notas</b></p>
            </td>
            <td>
                <p><b>Nombre cliente</b></p>
            </td>
        </tr>
        <tr>
            <td>{{ $cuota->concepto }}</td>
            <td>{{ $cuota->f_emision }}</td>
            <td>{{ $cuota->importe }}</td>
            <td>{{ $cuota->opcionesPagado() }}</td>
            <td>{{ $cuota->fechaPago() }}</td>
            <td>{{ $cuota->notas }}</td>
            <td>{{ $cuota->cliente->nombre }}</td>
        </tr>
    </table><br>

    <table class="table">
        <tr>
            <td><b>Importe</b></td>
            <td>{{ $cuota->importe }}</td>
        </tr>
        <tr>
            <td><b>IVA</b></td>
            <td>{{ round($cuota->importe * 0.21, 2) }}</td>
        </tr>
        <tr>
            <td><b>IMPORTE + IVA</b></td>
            <td>{{ round($cuota->importe * 1.21, 2) }}</td>
        </tr>
    </table>

    <p>Precio {{ $precio }} <b>{{ $cuota->cliente->moneda }}</b></p>


</body>

</html>
