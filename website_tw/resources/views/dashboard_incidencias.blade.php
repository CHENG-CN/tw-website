@extends('layouts.default')
@section('content')

    <div class="container my-4">
        <h1 class="mb-4">Incidencias del municipio</h1>

        <div class="row g-4">
            
            @forelse($todasIncidencias as $incidencia)

                <div class="col-12 col-md-6 col-lg-4">
                    <article class="border border-dark bg-body-tertiary p-3 rounded h-100 shadow-sm">

                        {{-- Cabecera --}}
                        <div class="d-flex justify-content-between align-items-end mb-2">
                            <h5 class="mb-0">
                                {{ $incidencia->titulo }}
                            </h5>

                            @switch(strtolower(($incidencia->estado ?? '')))
                                @case('pendiente')
                                    <span class="badge bg-warning text-white text-upppercase">Pendiente</span>
                                    @break
                                @case('en_proceso')
                                    <span class="badge bg-primary text-white text-uppercase">En proceso</span>
                                    @break
                                @case('solucionado')
                                    <span class="badge bg-success text-white text-uppercase">Solucionado</span>
                                    @break
                                @default
                                    <span calss="badge bg-primary text-white text-uppercase">Por validar</span>
                            @endswitch
                        </div>

                        {{-- Info --}}
                        <p class="mb-1">
                            <strong>Fecha:</strong>
                            {{ $incidencia->fecha }}
                        </p>

                        <p class="mb-2">
                            <strong>Ubicación:</strong>
                            {{ $incidencia->ubicacion }}
                        </p>

                        {{-- Imagen --}}
                        <div class="text-center mb-2">
                            <img src="{{ $incidencia->foto ?? 'https://via.placeholder.com/400x200' }}"
                                class="img-fluid rounded" style="max-height: 200px; object-fit: cover; width: 100%;">
                        </div>

                        {{-- Descripción --}}
                        <p class="small">
                            {{ Str::limit($incidencia->detalle, 100) }}
                        </p>

                        {{-- Botón--}}
                        <a href="{{ route('incidencias.detalle', $incidencia->id) }}" class="btn btn-outline-primary w-100">
                            Ver más </a>

                    </article>
                </div>

            @empty

                <p>No hay incidencias registradas.</p>

            @endforelse
        </div>
    </div>
@endsection