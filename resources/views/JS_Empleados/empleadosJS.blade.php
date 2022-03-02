@extends('layout')

@section('titulo')

Empleados JS

@endsection

@section('contenido')

<p>
    <input type="button" value="Añadir empleado" class="btn btn-primary " id="btAñadirTarea" onclick="addEmpleado()">
</p>

<table id="laravel_crud" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Fecha alta</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
            <tr id="row_{{ $empleado->empleado_id }}">
                <td>{{ $empleado->empleado_id }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->dni }}</td>
                <td>{{ $empleado->email }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->direccion }}</td>
                <td>{{date('d-m-Y', strtotime($empleado->f_alta))}}</td>
                <td>{{ $empleado->descripcionTipo() }}</td>
                <td><a href="javascript:void(0)" data-id="{{ $empleado->empleado_id }}"
                        onclick="editEmpleado(event.target)" class="btn btn-info">Editar</a>

                    <a href="javascript:void(0)" data-id="{{ $empleado->empleado_id }}" class="btn btn-danger"
                        onclick="deleteEmpleado(event.target)">Borrar</a>
                </td>
            </tr>
        @endforeach
    </tbody>

    @include('JS_Empleados.empleados_modal')
    @include('JS_Empleados.empleados_script')

@endsection
