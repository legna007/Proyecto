<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    //
    public function index(){
        //Obtener la lista de documentos
        return view('Archivo.index');
    }


    public function create(){
        //Obtener datos
        $dato1="Hola";
        return view('Archivo.index', compact('dato1'));
        /*return view('Archivo.index', [
            'data' => $dato1
        ]);*/
    }
}
