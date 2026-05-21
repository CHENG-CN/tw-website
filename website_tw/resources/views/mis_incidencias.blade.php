@extends('layouts.default')
@section('titulo_pagina', "Incidencias de " . auth()->user()->name)
@section('content')

<div class="container my-4">
    <h2 class="mb-4">Mis incidencias</h2>
    <div class="row g-4">

        @forelse($misIncidencias as $incidencia)

            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <x-tarjeta eliminar="true" :incidencia="$incidencia"/>
            </div>
        @empty
            <p>No tienes incidencias reportadas todavía.</p>

        @endforelse

    </div>

</div>

@endsection