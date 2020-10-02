<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Session;
use Validator;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $to = "info@todovidrio.uy";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $message = "Nombre: {$request->name} <br>Email: {$request->email} <br>Telefono: {$request->phone} <br>Mensaje: {$request->message}";
        mail($to, "Contacto - Sitio Web", $message, $headers);
    }
}
