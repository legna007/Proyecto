<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index(){
        //Obtener la lista de documentos
        return view('Nomenclador.Cargo.index');
    }


    public function create(){
        //Obtener datos
        $dato3="legna";
        return view('Nomenclador.Cargo.index', compact('datos3'));
}
}
