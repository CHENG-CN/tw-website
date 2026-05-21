@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-primary fw-bold mb-0">Validar Incidencias</h2>
            <p class="text-muted">Validación de Incidencias.</p>
        </div>
        <span class="badge bg-primary rounded-pill px-3 py-2">
            {{ $incidenciasPendientes->count() }} Pendientes
        </span>
    </div>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Incidencia</th>
                            <th>Ubicación</th>
                            <th>Fecha</th>
                            <th>Ciudadano</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($incidenciasPendientes as $incidencia)
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark">{{ $incidencia['titulo'] }}</div>
                                    <small class="text-muted">{{ Str::limit($incidencia['detalle'], 40) }}</small>
                                </td>
                                <td>
                                    <i class="bi bi-geo-alt text-danger me-1"></i>
                                    <p><strong>Ubicación:</strong> {{ explode('|', $incidencia->ubicacion)[0] }}</p>
                                </td>
                                <td>{{ $incidencia['fecha'] }}</td>
                                <td>
                                    <span class="badge bg-secondary text-white">
                                        {{ $incidencia->user->name }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                <div class="btn-group align-items-center">
                                    <a href="{{ route('incidencias.detalle', $incidencia->id) }}" class="btn btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <form action="{{ route('incidencias.validar', $incidencia->id) }}" method="POST" class="d-inline ms-2">
                                        <button type="submit" class="btn btn-success btn-sm rounded-pill px-3">
                                            Validar
                                        </button>
                                    </form>

                                    <form action="{{ route('incidencias.rechazar', $incidencia->id) }}" method="POST" class="d-inline ms-2">
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                                            Rechazar
                                        </button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <i class="bi bi-check2-circle display-1 text-success opacity-25"></i>
                                    <h4 class="mt-3 text-muted">No hay incidencias por validar</h4>
                                    <a href="{{ route('perfil') }}" class="btn btn-primary btn-sm mt-2">Volver al Perfil</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection