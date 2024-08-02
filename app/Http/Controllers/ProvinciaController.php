<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function index(){
        //Obtener la lista de documentos
        return view('Nomenclador.Provincia.index');
    }


    public function create(){
        //Obtener datos
        $dato="prov";
        return view('Nomenclador.Provincia.index', compact('dato'));
} 
}
