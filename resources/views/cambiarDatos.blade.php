@extends('layout')

@section('titulo')

Mi perfil

@endsection

@section('contenido')

<a href="{{route('tareas.index')}}" class="btn btn-primary">Volver</a>

<form action="{{route('perfil.update', auth()->user()->empleado_id)}}" method="post" enctype="multipart/form">
    @csrf
    @method('PUT')
    <div class="container col-md-4">
        <p>Correo:
            <br><input type="text" name="email" class="form-control" id="email" value="{{old('email',auth()->user()->email)}}" readonly>
        </p>
        @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <p>Contraseña:
            <br><input type="password" name="password" class="form-control" id="password" value="">
        </p>
        @error('password')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <input type="submit" value="Modificar" class="btn btn-primary">
    </div>

</form>


@endsection
