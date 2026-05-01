<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;


Route::get('/', function () {

    return view('welcome');
})->name('home');

Route::get('/mis_incidencias', function(Request $request) {
    
    /* si no está el usuario registrado, entonces lo redirige a la página de login */
    if (!$request->session()->has('user')){
        return redirect()->route('login');
    }

    $nombreUsuario =$request->session()->get('user');

    $todasLasIncidencias = config('incidencias_reportadas');

    $misIncidencias = $todasLasIncidencias[$nombreUsuario];

    return view('mis_incidencias', compact('misIncidencias'));

})->name('incidencias_reportadas');

Route::get('/lista', function() {
    return view('mis_incidencias');
})->name('lista_incidencias');

Route::get('/login', function(Request $request) {
    // Para borrar los cookies, para test
    //$request->session()->flush();
    return view('login');
})->name('login');

/* Se llama al controlador  AuthController y se llama su método login */
Route::post('/login', [AuthController::class, 'login'])->name('login.post');