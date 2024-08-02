<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaArchivoController extends Controller
{
    public function index(){
        //Obtener la lista de documentos
        return view('Nomenclador.ListaArchivo.index');
    }


    public function create(){
        //Obtener datos
        $dato="proced";
        return view('Nomenclador.ListaArchivo.index', compact('dato'));
}
}
