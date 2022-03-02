@extends('layout')

@section('titulo')

Tareas operario

@endsection

@section('contenido')

<h1 class="text-center">Tareas (operario)</h1>

        <table id="tablaOperario" class="table">
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
                    <td>
                        {{-- Modificar --}}
                        <a href="{{ route('operario.edit', $tarea->tarea_id) }}" class="icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>




    <p>{!! $tareas->links() !!}</p>

@endsection
