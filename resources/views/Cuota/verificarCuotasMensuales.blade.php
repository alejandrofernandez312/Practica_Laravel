@extends('layout')

@section('titulo')

Desea crear cuotas

@endsection

@section('contenido')


<p class="display-1">¿Desea crear las cuotas mensuales?</p>
<p class="text-center">
    <a href="{{  route('insertarCuotasMensuales')}}"><input type="button" value="Si" class="btn btn-success btn-lg" id="btAñadirTarea"></a>
    <a href="{{ route('cuotas.index') }}"><input type="button" value="No" class="btn btn-danger btn-lg" id="btAñadirTarea"></a>
</p>

@endsection
