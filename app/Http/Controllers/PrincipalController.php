<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index(){
        return view('Principal.home');
    }

    public function login(){
        return view('auth.login');
    }

}
    