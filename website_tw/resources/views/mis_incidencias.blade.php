@extends('layouts.default')
@section('titulo_pagina', "Incidencias de " . auth()->user()->name)
@section('content')

<div class="container my-4">
    <h2 class="mb-4">Mis incidencias</h2>
    <div class="row g-4">

        @forelse($misIncidencias as $incidencia)

            <div class="col-12 col-md-6 col-lg-4 mb-4">
                
                <article class="border border-dark bg-body-tertiary p-3 rounded h-100 shadow-sm d-flex flex-column">
                    
                    <div class="d-flex align-items-start mb-2">
                       <span class="badge {{ $incidencia->badge_color }} text-uppercase px-2 py-1" style="font-size: 10px; font-weight: 700;">
                            {{ $incidencia->estado_texto }}
                        </span>
                    </div>

                    <h5 class="my-2 fw-bold">
                         {{ $incidencia->titulo }}
                    </h5>
                    {{-- Fecha --}}
                    <p class="mb-1">
                        <strong>Fecha:</strong> {{ $incidencia['fecha'] }}
                    </p>

                    {{-- Ubicación --}}
                    <p class="mb-1">
                        📍{{ explode('|', $incidencia->ubicacion)[0] }}</p>
                    </p>

                    {{-- Descripción --}}
                    <p class="small">
                        {{ Str::limit($incidencia['detalle'], 100) }}
                    </p>

                    @if(isset($incidencia['foto']))
                        <div class="text-center mb-2 mt-auto">
                            <img 
                                src="{{ asset($incidencia['foto']) }}"
                                class="img-fluid rounded"
                                style="height: 180px; object-fit: cover; width: 100%;"
                            >
                        </div>
                    @endif

                    {{-- Acciones --}}
                    <div class="d-flex gap-2 mt-auto pt-3">
                        <a href="{{ route('incidencias.detalle', $incidencia->id) }}"
                        class="btn btn-outline-primary btn-sm w-100">
                            Ver más
                        </a>

                        <form action="{{ route('incidencias.eliminar', $incidencia->id) }}" method="POST" class="w-100" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta incidencia?');">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                Eliminar
                            </button>
                        </form>
                    </div>

                </article>
            </div>

        @empty

            <p>No tienes incidencias reportadas todavía.</p>

        @endforelse

    </div>

</div>

@endsection