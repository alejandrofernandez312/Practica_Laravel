@extends('layout')

@section('titulo')
    Eliminar cliente
@endsection

@section('contenido')
    <div class="container">
        <p class="display-1 text-center">¿Desea eliminar cliente?</p>
        <p class="text-center">
            <a href="{{ url('clientes/borrar', $cliente->cliente_id) }}"><input type="button" value="Si"
                    class="btn btn-success btn-lg"></a>
            <a href="{{ route('clientes.index') }}"><input type="button" value="No" class="btn btn-danger btn-lg"></a>
        </p>
    </div>
@endsection
