@extends('layout')

@section('titulo')

Eliminar cuota

@endsection

@section('contenido')

<div class="container">
    <p class="display-1 text-center">¿Desea eliminar cuota?</p>
    <p class="text-center">
        <a href="{{  url('cuotas/borrar', $cuota->cuota_id) }}"><input type="button" value="Si" class="btn btn-success btn-lg"></a>
        <a href="{{ route('cuotas.index') }}"><input type="button" value="No" class="btn btn-danger btn-lg"></a>
    </p>
</div>

@endsection
