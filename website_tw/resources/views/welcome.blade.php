@extends('layouts.default')

@section('content')
<div class="container-fluid">
    
    <section class="text-center py-5 mb-5 rounded-4 shadow-sm border border-primary-subtle hero-granada">
        
        <div class="hero-overlay"></div>

        <div class="row justify-content-center hero-content py-4">
            <div class="col-md-8 text-white">
                <i class="bi bi-geo-alt-fill text-danger display-4 mb-3"></i>
                <h1 class="display-4 fw-bold text-white">Gestión de Incidencias Granada</h1>
                <p class="lead text-white-50">Haz de tu ciudad un lugar mejor. Reporta desperfectos en la vía pública de forma rápida y sencilla.</p>
                
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center mt-4">
                    @auth
                    <a href="{{ route('formulario_incidencia') }}" class="btn btn-gh-primary btn-lg px-4 shadow">
                        <i class="bi bi-megaphone me-2"></i>Nueva Incidencia
                    </a>  
                    @else
                    <a href="{{ route('login') }}" class="btn btn-gh-primary btn-lg px-4 shadow">
                        <i class="bi bi-megaphone me-2"></i>Nueva Incidencia
                    </a>
                    @endauth

                    <a href="{{ route('lista_incidencias') }}" class="btn btn-outline-light btn-lg px-4 shadow-sm">
                        <i class="bi bi-search me-2"></i>Ver todas
                    </a>
                </div>
            </div>
        </div>
    </section>

        <div class="row mb-5 g-4 text-center">
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border-bottom border-primary border-4">
                <h2 class="fw-bold">{{ $resueltas }}</h2>
                <span class="text-muted text-uppercase small fw-semibold">Incidencias Resueltas</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border-bottom border-warning border-4">
                <h2 class="fw-bold">{{ $proceso }}</h2>
                <span class="text-muted text-uppercase small fw-semibold">En Proceso</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border-bottom border-info border-4">
                <h2 class="fw-bold">{{ $total }}</h2>
                <span class="text-muted text-uppercase small fw-semibold">Total Reportadas</span>
            </div>
        </div>
    </div>

    <div class="row align-items-center py-4">
        <div class="col-md-6">
            <h3 class="fw-bold mb-4">¿Cómo funciona el servicio?</h3>
            <ul class="list-unstyled">
                <li class="mb-3 d-flex align-items-start">
                    <i class="bi bi-1-circle-fill text-primary fs-4 me-3"></i>
                    <div>
                        <strong>Identifica el problema:</strong> Localiza la incidencia y toma una fotografía descriptiva.
                    </div>
                </li>
                <li class="mb-3 d-flex align-items-start">
                    <i class="bi bi-2-circle-fill text-primary fs-4 me-3"></i>
                    <div>
                        <strong>Envía el reporte:</strong> Usa nuestro formulario para enviarnos la ubicación y el detalle técnico.
                    </div>
                </li>
                <li class="mb-3 d-flex align-items-start">
                    <i class="bi bi-3-circle-fill text-primary fs-4 me-3"></i>
                    <div>
                        <strong>Seguimiento:</strong> Recibirás actualizaciones sobre el estado de la reparación en tiempo real.
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection