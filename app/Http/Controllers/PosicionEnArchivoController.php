<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosicionEnArchivoController  extends Controller
{
    public function index(){
        //Obtener la lista de documentos
        return view('Nomenclador.PosicionEnArchivo.index');
    }


    public function create(){
        //Obtener datos
        $dato="pos";
        return view('Nomenclador.PosicionEnArchivo.index', compact('dato'));
}}
