@extends('layout')

@section('titulo')

Modificar cliente

@endsection

@section('contenido')

    <p>
        <a href="{{ route('clientes.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
    </p>

    <form action="{{ route('clientes.update', $cliente->cliente_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container row">
            <div class="col-6">
                <p>Nombre:
                    <br><input type="text" name="nombre" class="form-control" id="nombre" value="{{ $cliente->nombre }}">
                </p>
                @error('nombre')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>CIF:
                    <br><input type="text" name="cif" class="form-control" id="cif" value="{{ $cliente->cif }}">
                </p>
                @error('cif')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Teléfono:
                    <br><input type="text" name="telefono" class="form-control" id="telefono" value="{{ $cliente->telefono }}">
                </p>
                @error('telefono')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Email:
                    <br><input type="text" name="email" class="form-control" id="email" value="{{ $cliente->email }}">
                </p>
                @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @endif

                <input type="submit" class="btn btn-success" value="Modificar">
            </div>


            <div class="col-6">
                <p>Cuenta corriente:
                    <br><input type="text" name="cuenta_corriente" class="form-control" id="cuenta_corriente" value="{{ $cliente->cuenta_corriente }}">
                </p>
                @error('cuenta_corriente')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Moneda:
                    <br><select name="moneda" class="form-select" id="moneda">
                        @foreach ($paises as $pais)
                            @if ($cliente->moneda == $pais->iso_moneda)
                                <option value="{{$cliente->moneda}}" selected>{{$cliente->moneda}}</option>
                            @else
                                <option value="{{$pais->iso_moneda}}">{{$pais->iso_moneda}}</option>
                            @endif
                        @endforeach
                    </select>
                </p>
                <p>Importe:
                    <br><input type="text" name="importe" class="form-control" id="importe" value="{{ $cliente->importe }}">
                </p>
                @error('importe')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>País:
                    <br><select name="pais" class="form-select" id="pais">
                        @foreach ($paises as $pais)
                            @if ($cliente->pais_id == $pais->id)
                                <option value="{{$pais->id}}" selected>{{$pais->nombre}}</option>
                            @else
                                <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </p>
            </div>
        </div>
    </form>


@endsection
