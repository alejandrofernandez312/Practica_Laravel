<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadosJSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empleados = Empleado::all();

        return view('JS_Empleados.empleadosJS', [
            'empleados' => $empleados
        ]);
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
        $request->validate([
            'nombre' => 'required|max:255',
            'password' => 'required',
            'dni' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'direccion' => 'required'
        ]);


        $empleado = Empleado::updateOrCreate(['empleado_id' => $request->empleado_id], [
            'nombre' => $request->nombre,
            'password' => bcrypt($request->password),
            'dni' => $request->dni,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'f_alta' => Date('Y-m-d'),
            'tipo' => $request->tipo
        ]);

        return response()->json(['code' => 200, 'message' => 'Empleado Created successfully', 'data' => $empleado], 200);
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
        $empleado = Empleado::find($id);

        return response()->json($empleado);
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
        Empleado::find($id)->delete();
    }
}
