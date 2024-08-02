<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    //
    public function index(){
        //Obtener la lista de documentos
        return view('Administracion.Configuracion.index');
    }


    public function create(){
        //Obtener datos
        $dato2="hi";
        return view('Administracion.Configuracion.index', compact('datos2'));
}
}