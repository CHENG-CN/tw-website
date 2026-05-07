@extends('layouts.default')
@section('titulo_pagina', "Estado incidencia: ".$incidencia['titulo'])
@section('content')

<!-- /* Vamos a suponer que nos pasan la lista de  incidencias_reportadas asociadas al usuario */
/* Solo se encargará de mostrarnos las incidencias -->


<div class="card shadow-sm border-0 mb-4 overflow-hidden">
    <div class="row g-0">
        <div class="col-md-4">
            <img 
                src="{{ asset($incidencia['foto']) }}" 
                class="img-fluid h-100 w-100" 
                alt="{{ $incidencia['info_img'] ?? 'Imagen de incidencia' }}"
                style="object-fit: cover; min-height: 200px;"
            >
        </div>

        <div class="col-md-8">
            <div class="card-body d-flex flex-column h-100">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title fw-bold mb-0">{{ $incidencia['titulo'] }}</h5>
                    <span class="badge rounded-pill bg-info text-dark">
                        {{ ucfirst($incidencia['estado'] ?? "Por validar")}}
                    </span>
                </div>
                
                <p class="text-muted small mb-3">
                    <i class="bi bi-calendar-event"></i> {{ $incidencia['fecha'] }} | 
                    <i class="bi bi-geo-alt"></i> {{ $incidencia['ubicacion'] }}
                </p>

                <p class="card-text flex-grow-1 text-secondary">
                    {{ $incidencia['detalle'] }}
                </p>

                @if(isset($incidencia['info_img']))
                    <p class="text-decoration-underline small text-muted mb-3">
                        {{ $incidencia['info_img'] }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection