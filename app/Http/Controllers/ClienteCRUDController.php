<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Pais;


class ClienteCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Cliente.clientes', [
            'clientes' => Cliente::paginate(4)
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
        return view('Cliente.añadirCliente', [
            'paises' => Pais::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        //
        // $request->validated();


        // $cliente = new Cliente;
        // $cliente -> nombre = $request->nombre;
        // $cliente -> cif = $request->cif;
        // $cliente -> telefono = $request->telefono;
        // $cliente -> email = $request->email;
        // $cliente -> cuenta_corriente = $request->cuenta_corriente;
        // $cliente -> moneda = $request->moneda;
        // $cliente -> importe = $request->importe;
        // $cliente -> pais_id = $request->pais;
        // $cliente -> save();

        return "Ha pasado la validación";
        // return redirect()->route('clientes.index');
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
        return view('Cliente.modificarCliente', [
            'cliente' => Cliente::find($id),
            'paises' => Pais::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ClienteRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'cif' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'cuenta_corriente' => 'required',
            'importe' => 'numeric'
        ]);


        $cliente = Cliente::find($id);
        $cliente -> nombre = $request->nombre;
        $cliente -> cif = $request->cif;
        $cliente -> telefono = $request->telefono;
        $cliente -> email = $request->email;
        $cliente -> cuenta_corriente = $request->cuenta_corriente;
        $cliente -> moneda = $request->moneda;
        $cliente -> importe = $request->importe;
        $cliente -> pais_id = $request->pais;
        $cliente -> save();

        return redirect()->route('clientes.index');
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
        $cliente = Cliente::find($id);

        $cliente->delete();
        return redirect('/clientes');
    }
}
