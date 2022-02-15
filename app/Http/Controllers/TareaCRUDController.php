<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Cliente;

class TareaCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Tarea.tareas', [
            'tareas' => Tarea::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tarea.añadirTarea', [
            'clientes' => Cliente::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'telefono' => 'required',
            'descripcion' => 'required',
            'email' => 'required|email|unique:tarea',
            'direccion' => 'required'
        ]);


        $tarea = new Tarea;
        $tarea -> nombre = $request->nombre;
        $tarea -> telefono = $request->telefono;
        $tarea -> descripcion = $request->descripcion;
        $tarea -> email = $request->email;
        $tarea -> direccion = $request->direccion;
        $tarea -> estado = $request->estado;
        $tarea -> f_crea = date('Y-m-d', strtotime($request->f_creacion));
        $tarea -> f_rea = date('Y-m-d', strtotime($request->f_realizacion));
        $tarea -> anot_anteriores = $request->anot_anteriores;
        $tarea -> anot_posteriores = $request->anot_posteriores;
        $tarea -> fichero = $request->fichero;
        $tarea -> cliente_id = $request->cliente;
        $tarea -> save();


        return redirect()->route('tareas.index');
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
        return view('Tarea.modificarTarea', [
            'tarea' => Tarea::find($id),
            'clientes' => Cliente::all()
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
        $tarea -> nombre = $request->nombre;
        $tarea -> telefono = $request->telefono;
        $tarea -> descripcion = $request->descripcion;
        $tarea -> email = $request->email;
        $tarea -> direccion = $request->direccion;
        $tarea -> estado = $request->estado;
        $tarea -> f_crea = date('Y-m-d', strtotime($request->f_creacion));
        $tarea -> f_rea = date('Y-m-d', strtotime($request->f_realizacion));
        $tarea -> anot_anteriores = $request->anot_anteriores;
        $tarea -> anot_posteriores = $request->anot_posteriores;
        $tarea -> fichero = $request->fichero;
        $tarea -> cliente_id = $request->cliente;
        $tarea -> save();

        return redirect()->route('tareas.index');
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

        $tarea = Tarea::find($id);

        $tarea->delete();
        return redirect()->route('tareas.index');
    }
}