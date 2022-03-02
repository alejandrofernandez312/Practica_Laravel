<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\Empleado;

class OperarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Operario.tareasOP', [
            'tareas' => Tarea::where('empleado_id', auth()->user()->empleado_id)
                ->where('estado', 'P')
                ->paginate(4)
        ]);
        // dd(auth()->user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('Operario.modificarTareaOP', [
            'tarea' => Tarea::find($id),
            'clientes' => Cliente::all(),
            'empleados'=> Empleado::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'telefono' => 'required',
            'descripcion' => 'required',
            'email' => 'required|email', //Preguntar lo de unique:tarea
            'direccion' => 'required'
        ]);


        $tarea = Tarea::find($id);
        $tarea -> estado = $request->estado;
        $tarea -> anot_anteriores = $request->anot_anteriores;
        $tarea -> anot_anteriores = $request->anot_anteriores;
        $tarea -> anot_posteriores = $request->anot_posteriores;
        $tarea -> fichero = $request->fichero;
        $tarea -> save();

        return redirect()->route('operario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
