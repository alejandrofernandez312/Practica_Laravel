@extends('layout')

@section('titulo')

Tareas

@endsection

@section('contenido')

<p>
    <a href="{{ route('tareas.create') }}"><input type="button" value="Añadir tarea" class="btn btn-primary " id="btAñadirTarea"></a>
</p>


    <table id="tablaTareas" class="table">
        <thead>
            <tr>
                <td><b>Nombre</b></td>
                <td><b>Teléfono</b></td>
                <td><b>Descripción</b></td>
                <td><b>Email</b></td>
                <td><b>Dirección</b></td>
                <td><b>Estado</b></td>
                <td><b>Fecha creación</b></td>
                <td><b>Fecha realización</b></td>
                <td><b>Anotaciones anteriores</b></td>
                <td><b>Anotaciones posteriores</b></td>
                <td><b>Fichero</b></td>
                <td><b>Cliente</b></td>
                <td><b>Empleado</b></td>
                <td><b>Acciones</b></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
            <tr id={{$tarea->tarea_id}}>
                <td>{{$tarea->nombre}}</td>
                <td>{{$tarea->telefono}}</td>
                <td>{{$tarea->descripcion}}</td>
                <td>{{$tarea->email}}</td>
                <td>{{$tarea->direccion}}</td>
                <td>{{$tarea->descripcionEstado()}}</td>
                <td>{{date('d-m-Y', strtotime($tarea->f_crea))}}</td>
                <td>{{date('d-m-Y', strtotime($tarea->f_rea))}}</td>
                <td>{{$tarea->anot_anteriores}}</td>
                <td>{{$tarea->anot_posteriores}}</td>
                <td>{{$tarea->fichero}}</td>
                <td>{{$tarea->cliente->nombre}}</td>
                <td>{{$tarea->empleado->nombre}}</td>
                <td>
                    {{-- Modificar --}}
                    <a href="{{ route('tareas.edit', $tarea->tarea_id) }}" class="icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                    </a>
                    {{-- Borrar --}}
                    <a href="{{ url('tareas/borrar', $tarea->tarea_id) }}" class="icons" onclick="
                        return confirm('¿Estás seguro de que desea eliminar esta tarea?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                          </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>{!! $tareas->links() !!}</p>

@endsection
