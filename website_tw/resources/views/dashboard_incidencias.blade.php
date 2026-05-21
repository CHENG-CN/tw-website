@extends('layouts.default')
@section('content')

    <div class="container my-4">
        <h1 class="mb-4">Incidencias del municipio</h1>

        <div class="row g-4">

            @forelse($todasIncidencias as $incidencia)
               <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <x-tarjeta eliminar="false" :incidencia="$incidencia"/>
                </div>
            @empty

                <p>No hay incidencias registradas.</p>
            @endforelse
        </div>
    </div>
@endsection