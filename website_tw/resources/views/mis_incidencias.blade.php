@extends('layouts.default')
@section('titulo_pagina', "Incidencias de " . session('user'))
@section('content')

<div class="container my-4">
    <h2 class="mb-4">Mis incidencias</h2>
    <div class="row g-4">
        @forelse($misIncidencias as $incidencia)
            <div class="col-12 col-md-6 col-lg-4">
                <article class="border border-dark bg-body-tertiary p-3 rounded h-100 shadow-sm">
                    <div class="d-flex justify-content-between align-items-start mb-2">

                        <h5 class="mb-0">
                            {{ $incidencia['titulo'] }}
                        </h5>

                        <span class="badge bg-info text-dark">
                            {{ $incidencia['estado'] ?? "Por validar" }}
                        </span>

                    </div>

                    {{-- Fecha --}}
                    <p class="mb-1">
                        <strong>Fecha:</strong> {{ $incidencia['fecha'] }}
                    </p>

                    {{-- Ubicación --}}
                    <p class="mb-2">
                        📍 {{ $incidencia['ubicacion'] }}
                    </p>

                    {{-- Descripción --}}
                    <p class="small">
                        {{ Str::limit($incidencia['detalle'], 100) }}
                    </p>

                    @if(isset($incidencia['foto']))
                        <div class="text-center mb-2">
                            <img 
                                src="{{ asset($incidencia['foto']) }}"
                                class="img-fluid rounded"
                                style="max-height: 180px; object-fit: cover; width: 100%;"
                            >
                        </div>
                    @endif

                    {{-- Acciones --}}
                    <div class="d-flex gap-2 mt-3">

                        <a href="{{ route('incidencias.detalle', $incidencia['id']) }}"
                           class="btn btn-outline-primary btn-sm w-100">
                            Ver
                        </a>

                        <button class="btn btn-danger btn-sm w-100">
                            Eliminar
                        </button>

                    </div>

                </article>

            </div>

        @empty

            <p>No tienes incidencias reportadas todavía.</p>

        @endforelse

    </div>

</div>

@endsection