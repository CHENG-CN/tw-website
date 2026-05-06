@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4 border-0 rounded-4">
        <h2 class="text-primary fw-bold">Mi Perfil</h2>
        <hr>

        @if(session()->has('user'))
            <div class="mb-4">
                <p class="mb-1 text-muted small">Nombre de usuario</p>
                <h5 class="fw-bold text-dark mb-3">{{ session('user') }}</h5>
                
                <p class="mb-1 text-muted small">Correo electrónico</p>
                <p class="text-dark">
                    <i class="bi bi-envelope me-2 text-primary"></i>{{ session('email') }}
                </p>
            </div>

            {{-- LISTA DE OPCIONES --}}
            <div class="list-group list-group-flush shadow-sm rounded-3">
                
                {{-- 1. Mis Incidencias --}}
                <a href="{{ route('mis_incidencias') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                    <i class="bi bi-journal-text fs-4 text-primary me-3"></i>
                    <div>
                        <div class="fw-bold">Mis Incidencias</div>
                    </div>
                </a>

                {{-- 2. Reportar Incidencia (Nueva opción sugerida) --}}
                <a href="{{ route('formulario_incidencia') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                    <i class="bi bi-plus-circle fs-4 text-success me-3"></i>
                    <div>
                        <div class="fw-bold">Reportar Incidencia</div>
                    </div>
                </a>

                {{-- 3. Validar Incidencias (Solo para Admin) --}}
                @if(session('administrador') == true)
                    <a href="{{ route('validar_incidencias')}}" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                        <i class="bi bi-shield-check fs-4 text-warning me-3"></i>
                        <div>
                            <div class="fw-bold">Validar Incidencias</div>
                        </div>
                    </a>
                    
                    <a href="{{ route('estado_incidencias')}}" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                        <i class="bi bi-arrow-repeat fs-4 text-warning me-3"></i>
                        <div>
                            <div class="fw-bold">Gestionar Incidencias</div>
                        </div>
                    </a>
                @endif
            </div>

            <div class="mt-5 text-center">
                <a href="{{ route('logout') }}" class="text-danger text-decoration-none fw-bold">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </a>
            </div>

        @else
            <div class="alert alert-danger rounded-4">
                No hay ninguna sesión activa.
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4">Ir al Login</a>
        @endif
    </div>
</div>
@endsection