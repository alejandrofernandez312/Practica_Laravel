@extends('layout')

@section('titulo')

Cuotaadsasds

@endsection

@section('contenido')



<h1 class="title">¿Desea crear las cuotas mensuales?</h1>
<p>
    <a href="{{  route('insertarCuotasMensuales') }}"><input type="button" value="Si" class="btn btn-success " id="btAñadirTarea"></a>
    <a href="{{ route('cuotas.index') }}"><input type="button" value="No" class="btn btn-primary " id="btAñadirTarea"></a>
</p>

@endsection
