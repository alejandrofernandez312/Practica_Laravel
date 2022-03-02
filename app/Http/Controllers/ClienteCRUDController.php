<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pais;
use App\Models\Cuota;


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
     * @param  \Illuminate\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|max:255',
            'cif' => 'required',
            'telefono' => 'required|numeric',
            'email' => 'required|email',
            'cuenta_corriente' => 'required',
            'importe' => 'required|numeric'
        ]);

        $clienteExiste = Cliente::where('email', $request->email)->first();
        if($clienteExiste!=null){
                return redirect()->back()->withInput($request->all())->with('error','Ese correo ya está asociado a un cliente');
        }


        $cliente = new Cliente;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cliente = Cliente::find($id);
        return view('Cliente.verificarBorrarCliente', [
            'cliente' => $cliente
        ]);
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
     * @param  \Illuminate\Http\Requests\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required|max:255',
            'cif' => 'required',
            'telefono' => 'required|numeric',
            'email' => 'required|email',
            'cuenta_corriente' => 'required',
            'importe' => 'required|numeric'
        ]);

        $clienteExiste = Cliente::where('email', $request->email)->first();
        if($clienteExiste!=null){
            if($id!=$clienteExiste->cliente_id){
                return redirect()->back()->withInput($request->all())->with('error','Ese correo ya está asociado a un cliente');
            }
        }



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
        $cuotas = Cuota::where('cliente_id', $id)->get();
        foreach($cuotas as $cuota){
            $cuota->delete();
        }

        $cliente = Cliente::find($id);

        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
