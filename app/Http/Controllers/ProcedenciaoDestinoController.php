<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcedenciaoDestinoController extends Controller
{
   
    public function index(){
        //Obtener la lista de documentos
        return view('Nomenclador.ProcedenciaoDestino.index');
    }


    public function create(){
        //Obtener datos
        $dato="dest";
        return view('Nomenclador.ProcedenciaoDestino.index', compact('dato'));
} 
}
