<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailMailable;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public static function enviarCorreo($email){
        Mail::to($email)->send(new MailMailable);
    }
}
