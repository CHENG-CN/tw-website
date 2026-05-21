@extends('layouts.default')
@section('titulo_pagina', "Estado incidencia: ".$incidencia['titulo'])
@section('content')

<div class="card shadow-sm border-0 mb-4 overflow-hidden">
    <div class="row g-0">
        <div class="col-md-4">
            <a href="#" data-bs-toggle="modal" data-bs-target="#imagenAmpliar" style="cursor: zoom-in;">
                <img 
                    src="{{ asset($incidencia['foto']) }}" 
                    class="img-fluid h-100 w-100" 
                    alt="{{ $incidencia['info_img'] ?? 'Imagen de incidencia' }}"
                    style="object-fit: cover; min-height: 200px;"
                >
            </a>
        </div>

        <div class="col-md-8">
            <div class="card-body d-flex flex-column h-100">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title fw-bold mb-0">{{ $incidencia['titulo'] }}</h5>

                    <span class="badge {{ $incidencia->badge_color }} text-upppercase" style="font-size: 10px; font-weight: 700;">
                        {{ $incidencia->estado_texto }}
                    </span>
                </div>
                
                <p class="text-muted small mb-3">
                    <i class="bi bi-calendar-event"></i> {{ $incidencia['fecha'] }} | 
                    <i class="bi bi-geo-alt"></i> {{ explode('|', $incidencia->ubicacion)[0] }}
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


    <div class="modal fade" id="imagenAmpliar" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl"> 
            <div class="modal-content bg-transparent border-0"> 
                <div class="modal-body p-0 position-relative text-center">
                    
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 fs-4" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1055;"></button>
                    
                    <img 
                        src="{{ asset($incidencia['foto']) }}" 
                        class="img-fluid rounded shadow" 
                        alt="{{ $incidencia['info_img'] ?? 'Imagen ampliada' }}"
                        style="max-height: 90vh; object-fit: contain;"
                    >
                    
                    @if(isset($incidencia['info_img']))
                        <p class="text-white mt-2 small">{{ $incidencia['info_img'] }}</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection