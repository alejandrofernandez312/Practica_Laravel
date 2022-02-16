<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Cliente;

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
        // $request->validate([
        //     'nombre' => 'required|min:3|max:255',
        //     'telefono' => 'required',
        //     'descripcion' => 'required',
        //     'email' => 'required|email',
        //     'direccion' => 'required'
        // ]);

        $cliente = Cliente::where('cif', $request->cif)->first();
        if(!$cliente){
            echo "NO Existe";
        }else{
            if($cliente->telefono == $request->telefono){
                $tarea = new Tarea;
                $tarea -> nombre = $request->nombre;
                $tarea -> telefono = $request->telefono;
                $tarea -> descripcion = $request->descripcion;
                $tarea -> email = $request->email;
                $tarea -> direccion = $request->direccion;
                $tarea -> estado = "P";
                $tarea -> f_crea = date('Y-m-d');
                $tarea -> cliente_id = $cliente->cliente_id;
                $tarea -> save();
            }else{
                echo "no coincide";
            }
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
