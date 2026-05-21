<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GestionIncidencias;
use App\Http\Controllers\ContactoController;
use App\Models\Incidencia;

use Illuminate\Http\Request;

//modificado
Route::get('/', function () {
    $incidencias = Incidencia::all();
    $enProcesoYPendientes = $incidencias->whereIn('estado', ['pendiente', 'en_proceso'])->count();

    return view('welcome', [
        'resueltas'   => $incidencias->where('estado', 'solucionado')->count(),
        'proceso'     => $enProcesoYPendientes, 
        'total'       => $incidencias->count(),
        'incidencias' => $incidencias
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


Route::get('/formulario_registrar', function () {
    return view('formulario_registro');
})->name('formulario_registro');

Route::post('/registrar', [AuthController::class, 'register'])->name('register.post');

Route::post('/incidencias', [GestionIncidencias::class, 'reportar_incidencia'])->name('incidencias.post');

Route::get('/logout', [AuthController::class, 'logout_db'])->name('logout');

/* Se llama al controlador  AuthController y se llama su método login */
Route::post('/login', [AuthController::class, 'login_db'])->name('login.post');


Route::prefix('perfil')->group(function () {

    Route::get('/formulario_incidencia', function () {
        return view('formulario_incidencia');
    })->name('formulario_incidencia');

    Route::get('/mis_incidencias', [GestionIncidencias::class, 'listarMisIncidencias_bd'])
        ->name('mis_incidencias');

    Route::get('/validar', [GestionIncidencias::class, 'listarIncidenciasPorValidar'])
       ->name('validar_incidencias');
    
    Route::get('/estado_incidencias', [GestionIncidencias::class, 'listarIncidenciasValidadas'])
        ->name('estado_incidencias');
});

Route::patch('/perfil/estado_incidencias/{id}', [GestionIncidencias::class, 'actualizarEstado'])->name('incidencias.actualizar_estado');

Route::post('/incidencias/validar/{id}', [GestionIncidencias::class, 'validarIncidencia'])->name('incidencias.validar');
Route::post('/incidencias/rechazar/{id}', [GestionIncidencias::class, 'rechazarIncidencia'])->name('incidencias.rechazar');
Route::delete('/incidencias/eliminar/{id}', [App\Http\Controllers\GestionIncidencias::class, 'eliminarIncidencia'])->name('incidencias.eliminar');