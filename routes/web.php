<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\EmisorDestinatarioController; 
use App\Http\Controllers\ListaArchivoController;
use App\Http\Controllers\PosicionEnArchivoController; 
use App\Http\Controllers\ProcedenciaoDestinoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProvinciaController;
use App\Models\Archivos;
use App\Models\Emisor_destinatarios;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Descripciones;
use App\Models\Lista_archivo;
use App\Models\Procedencia;




Route::get('/', [App\Http\Controllers\PrincipalController::class, 'login'])->name('login2');


//require __DIR__.'/auth.php';

Route::get('/inicio', [App\Http\Controllers\PrincipalController::class, 'index'])->name('inicio');



Route::group(['prefix' => 'archivo'], function () {
    Route::get('/', [ArchivoController::class, 'index'])->name('archivo.list');
    Route::get('/create', [ArchivoController::class, 'create'])->name('archivo.create');
})->name('archivo');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix'  => 'configuracion'], function () {
        Route::get('/', [ConfiguracionController::class, 'index'])->name('configuracion.list');
        Route::get('/create', [ConfiguracionController::class, 'create'])->name('configuracion.create');
    })->name('configuracion');

    Route::group(['prefix'  => 'usuarios'], function () {
        Route::get('/', [UsuariosController::class, 'index'])->name('usuarios.list');
        Route::get('/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    })->name('usuarios');

    Route::group(['prefix'  => 'cargo'], function () {
        Route::get('/', [CargoController::class, 'index'])->name('cargo.list');
        Route::get('/create', [CargoController::class, 'create'])->name('cargo.create');
    })->name('cargo');
 

})->name('admin');

Route::group(['prefix' => 'nomencl'], function () {
    Route::group(['prefix'  => 'emisordestinatarios'], function () {
        Route::get('/', [EmisorDestinatarioController ::class, 'index'])->name('emisordestinatario.list');
        Route::get('/create', [EmisorDestinatarioController ::class, 'create'])->name('emisordestinatario.create');
    })->name('emisordestinatario');
    
    Route::group(['prefix'  => 'listaarchivo'], function () {
        Route::get('/', [ListaArchivoController  ::class, 'index'])->name('listaarchivo.list');
        Route::get('/create', [ListaArchivoController  ::class, 'create'])->name('listaarchivo.create');
    })->name('listaarchivo');

    Route::group(['prefix' => 'posicion'], function () {
        Route::get('/', [PosicionEnArchivoController  ::class, 'index'])->name('posicion.list');
        Route::get('/create', [PosicionEnArchivoController   ::class, 'create'])->name('posicion.create');
    })->name('posicion');

    Route::group(['prefix' => 'procedencia'], function () {
        Route::get('/', [ProcedenciaoDestinoController ::class, 'index'])->name('procedencia.list');
        Route::get('/create', [ProcedenciaoDestinoController  ::class, 'create'])->name('procedencia.create');
    })->name('procedencia');

    Route::group(['prefix' => 'provincia'], function () {
        Route::get('/', [ProvinciaController ::class, 'index'])->name('provincia.list');
        Route::get('/create', [ProvinciaController  ::class, 'create'])->name('provincia.create');
    })->name('provincia');
})->name('nomencl');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Auth::routes();



