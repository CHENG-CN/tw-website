@extends('layouts.default')
@section('titulo_pagina', "Dashboard incidencais")
@section('content')

<!-- /* Vamos a suponer que nos pasan la lista de  incidencias_reportadas asociadas al usuario */
/* Solo se encargará de mostrarnos las incidencias -->
<ul>
    <!-- TODO: Crear controlador que lo pinte, así se puede reutilizar para la parte de listados y ver estados-->
    @forelse($todasIncidencias as $usuarios)
        @foreach($usuarios as $incidencia)
        <li>
            <strong>{{ $incidencia['titulo'] }}</strong> ({{ $incidencia['fecha'] }}) <span class="badge bg-info text-dark">
                    Estado: {{ $incidencia['estado'] }}
            </span><br>
            
            <small>{{  $incidencia['ubicacion'] }}</small>
            <small> Más detalles...añadir enlace a incidencia</small>
        </li>
        @endforeach
    @empty
        <p> No hay incidencias en Granada. </p>
    @endforelse
</ul>


@endsection