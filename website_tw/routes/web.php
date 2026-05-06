<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GestionIncidencias;

use Illuminate\Http\Request;


Route::get('/', function () {
    $todas = collect(config('incidencias_reportadas'))->collapse();

    return view('welcome', [
        'resueltas' => $todas->where('estado', 'solucionado')->count(),
        'proceso'   => $todas->where('estado', 'pendiente' || 'en proceso')->count(),
        'total'     => $todas->count()
    ]);
})->name('home');

//Route::get('/mis_incidencias',  [GestionIncidencias::class, 'listarMisIncidencias'])->name('mis_incidencias');

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

Route::get('/formulario_contacto', function () {
    return view('formulario_contacto');
})->name('formulario_contacto');

Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.post');

//Route::get('/formulario_incidencia', function () {
 //   return view('formulario_incidencia');
//})->name('formulario_incidencia');

Route::post('/incidencias', [GestionIncidencias::class, 'reportar_incidencia'])->name('incidencias.post');

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

/* Se llama al controlador  AuthController y se llama su método login */
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


Route::prefix('perfil')->group(function () {

    Route::get('/formulario_incidencia', function () {
        return view('formulario_incidencia');
    })->name('formulario_incidencia');

    Route::get('/mis_incidencias', [GestionIncidencias::class, 'listarMisIncidencias'])
        ->name('mis_incidencias');

    Route::get('/validar', [GestionIncidencias::class, 'listarIncidenciasPorValidar'])
       ->name('validar_incidencias');
    
    Route::get('/estado_incidencias', [GestionIncidencias::class, 'listarIncidenciasValidadas'])
        ->name('estado_incidencias');
});