@extends('layout')

@section('titulo')
    Eliminar empleado
@endsection

@section('contenido')
    <div class="container">
        <p class="display-1 text-center">¿Desea eliminar empleado?</p>
        <p class="text-center">
            <a href="{{ url('empleados/borrar', $empleado->empleado_id) }}"><input type="button" value="Si"
                    class="btn btn-success btn-lg"></a>
            <a href="{{ route('empleados.index') }}"><input type="button" value="No" class="btn btn-danger btn-lg"></a>
        </p>
    </div>
@endsection
