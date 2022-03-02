@extends('layout')

@section('titulo')

Modificar tarea

@endsection

@section('contenido')

    <p>
        <a href="{{ route('operario.index') }}"><input type="button" value="Volver" class="btn btn-primary" ></a>
    </p>

    <form action="{{ route('operario.update', $tarea->tarea_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container row">
            <div class="col-6">
                <p>Nombre:
                    <br><input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre', $tarea->nombre)}}" readonly>
                </p>

                <p>Teléfono:
                    <br><input type="text" name="telefono" class="form-control" id="telefono" value="{{ $tarea->telefono }}" readonly>
                </p>

                <p>Descripción:
                    <br><input type="text" name="descripcion" class="form-control" id="descripcion" value="{{ $tarea->descripcion }}" readonly>
                </p>

                <p>Email:
                    <br><input type="text" name="email" class="form-control" id="email" value="{{ $tarea->email }}" readonly>
                </p>

                <p>Dirección:
                    <br><input type="text" name="direccion" class="form-control" id="direccion" value="{{ $tarea->direccion }}" readonly>
                </p>

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
                    <br><input type="date" name="f_realizacion" class="form-control" id="f_realizacion" value="{{ date('Y-m-d', strtotime($tarea->f_rea))}}" readonly>
                </p>
                <p>Anotaciones anteriores:
                    <br><input type="text" name="anot_anteriores" class="form-control" id="anot_anteriores" value="{{ $tarea->anot_anteriores }}">
                </p>
                <p>Anotaciones posteriores:
                    <br><input type="text" name="anot_posteriores" class="form-control" id="anot_posteriores" value="{{ $tarea->anot_posteriores }}">
                </p>
                <p>Fichero:
                    <br><input type="text" name="fichero" class="form-control" id="fichero" value="{{ $tarea->fichero }}">
                </p>
                <p>Cliente:
                    <br><input type="text" name="cliente" class="form-control" id="cliente" value="{{ $tarea->cliente->nombre }} ({{ $tarea->cliente->email }})" readonly>
                </p>
                <p>Empleado:
                    <br><input type="text" name="empleado" class="form-control" id="empleado" value="{{ $tarea->empleado->nombre }} ({{ $tarea->empleado->email }})" readonly>
                </p>
            </div>
        </div>
    </form>


@endsection
