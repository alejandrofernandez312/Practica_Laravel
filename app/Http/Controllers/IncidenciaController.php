<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tarea;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('incidencia');
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
        //FILTRADO DE TAREA
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'telefono' => 'required',
            'cif' => 'required',
            'descripcion' => 'required',
            'email' => 'required|email',
            'direccion' => 'required',
        ]);

        $checktlf = Cliente::where('telefono', $request->telefono)->get();
        $checkcif = Cliente::where('cif', $request->cif)->get();
        if ($checktlf->count() == 1 && $checkcif->count() == 1) {
            $id = $checkcif[0]->cliente_id;

            //Formulario Tareas cliente;
            $tarea = new Tarea;
            $tarea->nombre = $request->nombre;
            $tarea->cliente_id = $id;
            $tarea->telefono = $request->telefono;
            $tarea->email = $request->email;
            $tarea->estado = "P";
            $tarea->f_crea = date("Y-m-d");
            $tarea->direccion = $request->direccion;
            $tarea->descripcion = $request->descripcion;
            $tarea->save();
            return redirect()->route('incidencia.index')
                ->with('success', 'Se ha creado su incidencia');
        } else {
            return back()->withInput($request->all())
                ->with('error', 'El dni y el teléfono no coinciden');
        }

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
