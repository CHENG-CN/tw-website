@extends('layouts.default')
@section('content')

<!-- /* Vamos a suponer que nos pasan la lista de  incidencias_reportadas asociadas al usuario */
/* Solo se encargará de mostrarnos las incidencias -->

<ul>
    @forelse($misIncidencias as $incidencia)
        <li>
            <strong>{{ $incidencia['titulo'] }}</strong> ({{ $incidencia['fecha'] }})<br>
            <small>{{ $incidencia['detalle'] }} - En: {{ $incidencia['ubicacion'] }}</small>
        </li>
    @empty
        <p>No tienes incidencias reportadas todavía.</p>
    @endforelse

</ul>


@endsection