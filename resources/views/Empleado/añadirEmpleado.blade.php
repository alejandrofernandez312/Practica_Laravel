@extends('layout')

@section('titulo')
    Añadir empleado
@endsection

@section('contenido')
    <h1 class="text-center">Añadir empleado</h1>

    <p>
        <a href="{{ route('empleados.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
    </p>

    <form action="{{ route('empleados.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container row">
            <div class="col-6">
                <p>Nombre:
                    <br><input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}">
                </p>
                @error('nombre')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Password:
                    <br><input type="text" name="password" class="form-control" id="password"
                        value="{{ old('password') }}">
                </p>
                @error('password')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>DNI:
                    <br><input type="text" name="dni" class="form-control" id="dni" value="{{ old('dni') }}">
                </p>
                @error('dni')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Email:
                    <br><input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                </p>
                @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @endif

                <input type="submit" class="btn btn-success" value="Añadir">
            </div>


            <div class="col-6">
                <p>Teléfono:
                    <br><input type="text" name="telefono" class="form-control" id="telefono"
                        value="{{ old('telefono') }}">
                </p>
                @error('telefono')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>Dirección:
                    <br><input type="text" name="direccion" class="form-control" id="direccion"
                        value="{{ old('direccion') }}">
                </p>
                @error('direccion')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>Fecha alta:
                    <br><input type="text" name="f_alta" class="form-control" id="f_alta" value="<?= Date('d-m-Y') ?>"
                        readonly>
                </p>
                @error('f_alta')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>Tipo:
                    <br><select name="tipo" class="form-select" id="tipo">
                        <option value="A">Administrador</option>
                        <option value="O">Operario</option>
                    </select>
                </p>
            </div>
        </div>
    </form>
@endsection
