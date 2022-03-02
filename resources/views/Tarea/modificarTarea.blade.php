@extends('layout')

@section('titulo')

Modificar tarea

@endsection

@section('contenido')

<h1 class="text-center">Modificar tarea</h1>

    <p>
        <a href="{{ route('tareas.index') }}"><input type="button" value="Volver" class="btn btn-primary" ></a>
    </p>

    <form action="{{ route('tareas.update', $tarea->tarea_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container row">
            <div class="col-6">
                <p>Nombre:
                    <br><input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre', $tarea->nombre)}}">
                </p>
                @error('nombre')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Teléfono:
                    <br><input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono', $tarea->telefono) }}">
                </p>
                @error('telefono')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Descripción:
                    <br><input type="text" name="descripcion" class="form-control" id="descripcion" value="{{old('descripcion', $tarea->descripcion) }}">
                </p>
                @error('descripcion')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Email:
                    <br><input type="text" name="email" class="form-control" id="email" value="{{ old('email', $tarea->email) }}">
                </p>
                @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Dirección:
                    <br><input type="text" name="direccion" class="form-control" id="direccion" value="{{ old('direccion', $tarea->direccion) }}">
                </p>
                @error('direccion')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Estado:
                    <br><select name="estado" class="form-select" id="estado">
                        @if ($tarea->estado == "P")
                            <option value="P" selected>Pendiente</option>
                            <option value="C">Cancelada</option>
                            <option value="F">Finalizada</option>
                        @elseif ($tarea->estado == "C")
                            <option value="P" >Pendiente</option>
                            <option value="C" selected>Cancelada</option>
                            <option value="F">Finalizada</option>
                        @else
                            <option value="P" >Pendiente</option>
                            <option value="C" >Cancelada</option>
                            <option value="F" selected>Finalizada</option>
                        @endif

                    </select>
                </p>
                <p>Fecha creación:
                    <br><input type="text" name="f_creacion" class="form-control" id="f_creacion" value="{{ date('d-m-Y', strtotime($tarea->f_crea)) }}" readonly>
                </p>
                <input type="submit" class="btn btn-success" value="Modificar">
            </div>


            <div class="col-6">
                <p>Fecha realización:
                    <br><input type="date" name="f_realizacion" class="form-control" id="f_realizacion" value="{{ $tarea->obtenerFechaRealizacion()}}">
                </p>
                <p>Anotaciones anteriores:
                    <br><input type="text" name="anot_anteriores" class="form-control" id="anot_anteriores" value="{{ old('anot_anteriores', $tarea->anot_anteriores) }}">
                </p>
                <p>Anotaciones posteriores:
                    <br><input type="text" name="anot_posteriores" class="form-control" id="anot_posteriores" value="{{ old('anot_posteriores', $tarea->anot_posteriores) }}">
                </p>
                <p>Fichero:
                    <br><input type="text" name="fichero" class="form-control" id="fichero" value="{{ old('fichero', $tarea->fichero) }}">
                </p>
                <p>Cliente:
                    <br><select name="cliente" class="form-select" id="cliente">
                        @foreach ($clientes as $cliente)
                            @if ($cliente->cliente_id == $tarea->cliente->cliente_id)
                                <option value="{{$tarea->cliente->cliente_id}}" selected>{{ $tarea->cliente->nombre }} ({{$tarea->cliente->email}})</option>
                            @else
                                <option value="{{$cliente->cliente_id}}">{{ $cliente->nombre }} ({{$cliente->email}})</option>
                            @endif
                        @endforeach
                    </select>
                </p>
                <p>Empleado:
                    <br><select name="empleado" class="form-select" id="empleado">
                        <option value="">Sin asignar</option>
                        @foreach ($empleados as $empleado)
                            @if($tarea->empleado!=null)
                                @if ($empleado->empleado_id == $tarea->empleado->empleado_id)
                                    <option value="{{$tarea->empleado->empleado_id}}" selected>{{ $tarea->empleado->nombre }} ({{$tarea->empleado->email}})</option>
                                @else

                                    <option value="{{$empleado->empleado_id}}">{{ $empleado->nombre }} ({{$empleado->email}})</option>
                                @endif
                            @else
                                <option value="{{$empleado->empleado_id}}">{{ $empleado->nombre }} ({{$empleado->email}})</option>
                            @endif

                        @endforeach
                    </select>
                </p>
            </div>
        </div>
    </form>


@endsection
