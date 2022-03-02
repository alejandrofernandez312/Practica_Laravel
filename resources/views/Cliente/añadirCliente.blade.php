@extends('layout')

@section('titulo')

Añadir cliente

@endsection

@section('contenido')

    <h1 class="text-center">Añadir cliente</h1>

    <p>
        <a href="{{ route('clientes.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
    </p>

    <form action="{{ route('clientes.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container row">
            <div class="col-6">
                <p>Nombre:
                    <br><input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}">
                </p>
                @error('nombre')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>CIF:
                    <br><input type="text" name="cif" class="form-control" id="cif" value="{{ old('cif') }}">
                </p>
                @error('cif')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Teléfono:
                    <br><input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}">
                </p>
                @error('telefono')
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
                <p>Cuenta corriente:
                    <br><input type="text" name="cuenta_corriente" class="form-control" id="cuenta_corriente" value="{{ old('cuenta_corriente') }}">
                </p>
                @error('cuenta_corriente')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>Moneda:
                    <br><select name="moneda" class="form-select" id="moneda">
                        @foreach ($paises as $pais)
                            <option value="{{$pais->iso_moneda}}">{{$pais->iso_moneda}}</option>
                        @endforeach
                    </select>
                </p>

                <p>Importe:
                    <br><input type="text" name="importe" class="form-control" id="importe" value="{{ old('importe') }}">
                </p>
                @error('importe')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>País:
                    <br><select name="pais" class="form-select" id="pais">
                        @foreach ($paises as $pais)
                            <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>
    </form>


@endsection
