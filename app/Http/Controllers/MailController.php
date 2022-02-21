<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailMailable;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function enviarCorreo($email){
        Mail::to($email)->send(new MailMailable);
    }

    public function enviarCorreoConPDF($email, $cuota){
        $data["email"] = $email;
        $data["title"] = "Cuota mensual SiempreColgados";
        $data["body"] = "Buenas, le adjunto el PDF con la cuota mensual:";

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('plantillaPDF', compact('cuota'));

        Mail::send('mail', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "Cuota.pdf");
        });

    }
}
