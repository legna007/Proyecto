<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
        //Obtener la lista de documentos
        return view('Administracion.Usuarios.index');
    }


    public function create(){
        //Obtener datos
        $dato2="hi";
        return view('Administracion.Usuarios.index', compact('datos2'));
    }
}
