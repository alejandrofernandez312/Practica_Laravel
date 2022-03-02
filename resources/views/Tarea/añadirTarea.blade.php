@extends('layout')

@section('titulo')

Añadir tarea

@endsection

@section('contenido')

<h1 class="text-center">Añadir tarea</h1>

    <p>
        <a href="{{ route('tareas.index') }}"><input type="button" value="Volver" class="btn btn-primary" id="btAñadirTarea"></a>
    </p>

    <form action="{{ route('tareas.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container row">
            <div class="col-6">
                <p>Nombre:
                    <br><input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}">
                </p>
                @error('nombre')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Teléfono:
                    <br><input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}">
                </p>
                @error('telefono')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Descripción:
                    <br><input type="text" name="descripcion" class="form-control" id="descripcion" value="{{ old('descripcion') }}">
                </p>
                @error('descripcion')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Email:
                    <br><input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                </p>
                @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Dirección:
                    <br><input type="text" name="direccion" class="form-control" id="direccion" value="{{ old('direccion') }}">
                </p>
                @error('direccion')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Estado:
                    <br><select name="estado" class="form-select" id="estado">
                        <option value="P">Pendiente</option>
                        <option value="C">Cancelada</option>
                        <option value="F">Finalizada</option>
                    </select>
                </p>
                <p>Fecha creación:
                    <br><input type="text" name="f_creacion" class="form-control" id="f_creacion" value="<?= date('d-m-Y') ?>" readonly>
                </p>
                <input type="submit" class="btn btn-success" value="Añadir">
            </div>


            <div class="col-6">


                <p>Fecha realización:
                    <br><input type="date" name="f_realizacion" class="form-control" id="f_realizacion">
                </p>

                <p>Anotaciones anteriores:
                    <br><input type="text" name="anot_anteriores" class="form-control" id="anot_anteriores" value="{{ old('anot_anteriores') }}">
                </p>

                <p>Anotaciones posteriores:
                    <br><input type="text" name="anot_posteriores" class="form-control" id="anot_posteriores" value="{{ old('anot_posteriores') }}">
                </p>

                <p>Fichero:
                    <br><input type="text" name="fichero" class="form-control" id="fichero" value="{{ old('fichero') }}">
                </p>

                <p>Cliente:
                    <br><select name="cliente" class="form-select" id="cliente">
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->cliente_id}}">{{$cliente->nombre}} ({{$cliente->email}}) </option>
                        @endforeach
                    </select>
                </p>
                <p>Empleado:
                    <br><select name="empleado" class="form-select" id="empleado">
                        @foreach ($empleados as $empleado)
                            <option value="{{$empleado->empleado_id}}">{{$empleado->nombre}} ({{$empleado->email}}) </option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>
    </form>


@endsection
