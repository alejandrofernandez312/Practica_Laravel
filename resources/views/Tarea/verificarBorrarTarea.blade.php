@extends('layout')

@section('titulo')

Eliminar tarea

@endsection

@section('contenido')

<div class="container">
    <p class="display-1 text-center">¿Desea eliminar tarea?</p>
    <p class="text-center">
        <a href="{{  url('tareas/borrar', $tarea->tarea_id) }}"><input type="button" value="Si" class="btn btn-success btn-lg"></a>
        <a href="{{ route('tareas.index') }}"><input type="button" value="No" class="btn btn-danger btn-lg"></a>
    </p>
</div>

@endsection
