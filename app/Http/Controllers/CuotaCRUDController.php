<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;
use Illuminate\Support\Facades\Mail;

class CuotaCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Cuota.cuotas', [
            'cuotas' => Cuota::paginate(4)
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
        return view('Cuota.añadirCuota', [
            'cuotas' => Cuota::all(),
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
        //
        $request->validate([
            'concepto' => 'required|max:255',
            'importe' => 'numeric'
        ]);


        $cuota = new Cuota;
        $cuota -> concepto = $request->concepto;
        $cuota -> f_emision = Date('Y-m-d');
        $cuota -> importe = $request->importe;
        $cuota -> pagada = $request->pagada;
        $cuota -> f_pago = $request->f_pago;
        $cuota -> notas = $request->notas;
        $cuota -> cliente_id = $request->cliente;
        $cuota -> save();


        $json = file_get_contents('https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/eur.json');

        $json = file_get_contents('https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/eur.json');

            $data = json_decode($json,true);
            $precio = round($data['eur'][strtolower($cuota->cliente->moneda)]* $cuota->importe,2);

            //Enviar correo

            $email = new MailController;
            $email->enviarCuotaExcepcionalPDF($cuota->cliente->email, $cuota, $precio);

        return redirect()->route('cuotas.index');
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
        $cuota = Cuota::find($id);
        return view('Cuota.verificarBorrarCuota', [
            'cuota' => $cuota
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
        return view('Cuota.modificarCuota', [
            'cuota' => Cuota::find($id),
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
            'concepto' => 'required|max:255',
            'importe' => 'numeric',
            'notas' => 'required'
        ]);


        $cuota = Cuota::find($id);
        $cuota -> concepto = $request->concepto;
        $cuota -> importe = $request->importe;
        $cuota -> pagada = $request->pagada;
        $cuota -> f_pago = $request->f_pago;
        $cuota -> notas = $request->notas;
        $cuota -> cliente_id = $request->cliente;
        $cuota -> save();


        return redirect()->route('cuotas.index');
    }

    public function verificarCuotasMensuales(){
        return view('Cuota.verificarCuotasMensuales');
    }

    public function insertarCuotasMensuales(){
        $clientes = Cliente::all();

        foreach ($clientes as $cliente){
            $cuota = new Cuota;
            $cuota->concepto = "Cuota mensual";
            $cuota->f_emision = Date('Y-m-d');
            $cuota->importe = $cliente->importe;
            $cuota->pagada = "N";
            $cuota->notas = "";
            $cuota->cliente_id = $cliente->cliente_id;
            $cuota->save();

            $json = file_get_contents('https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/eur.json');

            $data = json_decode($json,true);
            $precio = round($data['eur'][strtolower($cuota->cliente->moneda)]* $cuota->importe,2);

            //Enviar correo

            $email = new MailController;
            $email->enviarCorreoConPDF($cliente->email, $cuota, $precio);
        }

        return redirect()->route('cuotas.index');
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
        $cuota = Cuota::find($id);

        $cuota->delete();
        return redirect('/cuotas');
    }

    public function generarPDF($id){
        $cuota=Cuota::find($id);
        $pdf = app('dompdf.wrapper');


        $json = file_get_contents('https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/eur.json');

        $data = json_decode($json,true);
        $precio = round($data['eur'][strtolower($cuota->cliente->moneda)]* $cuota->importe,2);

        $pdf->loadView('plantillaPDF', compact('cuota'), compact('precio'));

        return $pdf->stream('cuota.pdf');


    }
}
