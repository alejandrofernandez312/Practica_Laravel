@extends('layout')

@section('titulo')

Modificar cuota

@endsection

@section('contenido')

    <p>
        <a href="{{ route('cuotas.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
    </p>

    <form action="{{ route('cuotas.update', $cuota->cuota_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container row">
            <div class="col-6">
                <p>Concepto:
                    <br><input type="text" name="concepto" class="form-control" id="concepto" value="{{ old('concepto', $cuota->concepto) }}">
                </p>
                @error('concepto')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Importe:
                    <br><input type="text" name="importe" class="form-control" id="importe" value="{{ old('importe', $cuota->importe) }}">
                </p>
                @error('importe')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <p>Pagada:
                    <br><select name="pagada" id="pagada" class="form-select">
                        @if($cuota->pagada == "S")
                            <option value="S" selected>Si</option>
                            <option value="N">No</option>
                        @else
                            <option value="S">Si</option>
                            <option value="N" selected>No</option>
                        @endif
                    </select>
                </p>


                <input type="submit" class="btn btn-success" value="Añadir">
            </div>


            <div class="col-6">
                <p>Fecha pago:
                    <br><input type="date" name="f_pago" class="form-control" id="f_pago" value="{{ date('Y-m-d', strtotime($cuota->f_pago))}}">
                </p>
                @error('f_pago')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>Notas:
                    <br><input type="text" name="notas" class="form-control" id="notas" value="{{ old('notas', $cuota->notas) }}">
                </p>
                @error('notas')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <p>Cliente:
                    <br><select name="cliente" class="form-select" id="cliente">
                        @foreach ($clientes as $cliente)
                            @if ($cliente->cliente_id == $cuota->cliente->cliente_id)
                                <option value="{{$cuota->cliente->cliente_id}}" selected>{{ $cuota->cliente->nombre }} ({{$cuota->cliente->email}})</option>
                            @else
                                <option value="{{$cliente->cliente_id}}">{{ $cliente->nombre }} ({{$cliente->email}})</option>
                            @endif
                        @endforeach
                    </select>
                </p>

            </div>
        </div>
    </form>


@endsection
