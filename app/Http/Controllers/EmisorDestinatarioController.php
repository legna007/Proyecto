<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmisorDestinatarioController extends Controller
{
    public function index(){
        //Obtener la lista de documentos
        return view('Nomenclador.EmisorDestinatario.index');
    }


    public function create(){
        //Obtener datos
        $dato="emis";
        return view('Nomenclador.EmisorDestinatario.index', compact('dato'));
}
}