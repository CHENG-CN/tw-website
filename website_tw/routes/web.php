<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GestionIncidencias;

use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/mis_incidencias',  [GestionIncidencias::class, 'listarMisIncidencias'])->name('mis_incidencias');

Route::get('/list/{id}', [GestionIncidencias::class, 'estadoIncidencia'])->name('incidencias.detalle');

Route::get('/list', [GestionIncidencias::class, 'listarTodasIncidencias'])->name('lista_incidencias');

Route::get('/login', function(Request $request) {
    // Para borrar los cookies, para test
    //$request->session()->flush();
    return view('login');
})->name('login');

Route::get('/perfil', function () {
    return view('perfil'); 
})->name('perfil');;

Route::get('/admin/validar', function () {
    return view('admin-validar'); 
});

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

/* Se llama al controlador  AuthController y se llama su método login */
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
