<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Empleado.empleados', [
            'empleados' => Empleado::paginate(4)
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
        return view('Empleado.añadirEmpleado', [
            'empleados' => Empleado::all()
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
        //
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'password' => 'required',
            'dni' => 'required|unique:empleado',
            'email' => 'required|email|unique:empleado',
            'telefono' => 'required|numeric',
            'direccion' => 'required'
        ]);


        $empleado = new Empleado;
        $empleado -> nombre = $request->nombre;
        $empleado -> password = $request->password;
        $empleado -> dni = $request->dni;
        $empleado -> email = $request->email;
        $empleado -> telefono = $request->telefono;
        $empleado -> direccion = $request->direccion;
        $empleado -> f_alta = Date('Y-m-d');
        $empleado -> tipo = $request->tipo;
        $empleado -> save();


        return redirect()->route('empleados.index');
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
        return view('Empleado.modificarEmpleado', [
            'empleado' => Empleado::find($id)
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
            'password' => 'required',
            'dni' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'direccion' => 'required'
        ]);


        $empleado = Empleado::find($id);
        $empleado -> nombre = $request->nombre;
        $empleado -> password = $request->password;
        $empleado -> dni = $request->dni;
        $empleado -> email = $request->email;
        $empleado -> telefono = $request->telefono;
        $empleado -> direccion = $request->direccion;
        $empleado -> f_alta = date('Y-m-d', strtotime($request->f_alta));
        $empleado -> tipo = $request->tipo;
        $empleado -> save();


        return redirect()->route('empleados.index');
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
        $empleado = Empleado::find($id);

        $empleado->delete();
        return redirect('/empleados');
    }
}
