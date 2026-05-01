@extends('layouts.default')
@section('titulo_pagina', "Estado incidencia: ".$incidencia['titulo'])
@section('content')

<!-- /* Vamos a suponer que nos pasan la lista de  incidencias_reportadas asociadas al usuario */
/* Solo se encargará de mostrarnos las incidencias -->

<strong>{{ $incidencia['titulo'] }}</strong> ({{ $incidencia['fecha'] }}) <span class="badge bg-info text-dark">
        Estado: {{ $incidencia['estado'] }}
</span> <br>

<small> Detalles: {{ $incidencia['detalle'] }} </small>
<small> Ubicación: {{ $incidencia['ubicacion'] }} </small>

@if (session('administrador')=== "true")
    <div class="admin-actions">
        <select name="estado" class="form-select form-select-sm d-inline-block w-auto">
            <option value="Pendiente" {{ $incidencia['estado'] == 'resuelta' ? 'selected' : '' }}> Resuelta </option>
            <option value="En curso" {{ $incidencia['estado'] == 'pendiente' ? 'selected' : '' }}> Pendiente </option>
            <option value="Realizado" {{ $incidencia['estado'] == 'en_proceso' ? 'selected' : '' }}> En curso </option>
        </select>
        <button class="btn btn-danger btn-sm"> Eliminar </button>
        <button class="btn btn-primary btn-sm"> Guardar cambios y avisar al reportador</button>
    </div>
@endif

<div class="text-center mt-2">
    <figure class="figure">
        <img
            src ="{{ asset($incidencia['foto']) }}"
            alt = "todo_meterle algo" 
            class = "figure-img img-fluid"
            style = "max-width: 800px; width: 100%; height: auto;"
            />
            <figcaption class="figure-caption text-center text-decoration-underline"> Caption </figcaption>
    </figure>
</div>


@endsection