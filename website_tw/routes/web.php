<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mis_incidencias', function() {
    return view('incidencias');
})->name('incidencias_reportadas');