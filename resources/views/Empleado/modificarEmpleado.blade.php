@extends('layout')

@section('titulo')

Modificar empleado

@endsection

@section('contenido')

    <p>
        <a href="{{ route('empleados.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
    </p>

    <form action="{{ route('empleados.update', $empleado->empleado_id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container row">
            <div class="col-6">
                <p>Nombre:
                    <br><input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre', $empleado->nombre) }}">
                </p>
                @error('nombre')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Password:
                    <br><input type="text" name="password" class="form-control" id="password" value="{{ old('password', $empleado->password) }}">
                </p>
                @error('password')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>DNI:
                    <br><input type="text" name="dni" class="form-control" id="dni" value="{{ old('dni', $empleado->dni) }}">
                </p>
                @error('dni')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Email:
                    <br><input type="text" name="email" class="form-control" id="email" value="{{ old('email', $empleado->email) }}">
                </p>
                @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <input type="submit" class="btn btn-success" value="Modificar">
            </div>


            <div class="col-6">
                <p>Teléfono:
                    <br><input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono', $empleado->telefono) }}">
                </p>
                @error('telefono')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>Dirección:
                    <br><input type="text" name="direccion" class="form-control" id="direccion" value="{{ old('direccion', $empleado->direccion) }}">
                </p>
                @error('direccion')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>Fecha alta:
                    <br><input type="text" name="f_alta" class="form-control" id="f_alta" value="{{date('d-m-Y', strtotime($empleado->f_alta))}}" readonly>
                </p>
                @error('f_alta')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>Tipo:
                    <br><select name="tipo" class="form-select" id="tipo">
                        @if($empleado->tipo == "A")
                            <option value="A" selected>Administrador</option>
                            <option value="O">Operario</option>
                        @else
                            <option value="A">Administrador</option>
                            <option value="O" selected>Operario</option>
                        @endif
                    </select>
                </p>
            </div>
        </div>
    </form>


@endsection
