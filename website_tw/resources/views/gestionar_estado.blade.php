@extends('layouts.default')

@section('content')

    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4 p-4">

            {{-- Encabezado --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="text-primary fw-bold mb-0">Seguimiento de Incidencias</h2>
                    <p class="text-muted small">Gestión de estados para incidencias validadas.</p>
                </div>
                <span class="badge bg-info text-dark rounded-pill px-3 py-2">
                    {{ $incidenciasValidadas->count() }} en Seguimiento
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="min-width: 900px;">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Incidencia</th>
                            <th>Ubicación</th>
                            <th>Fecha</th>
                            <th>Ciudadano</th>
                            <th class="text-end pe-4">Cambiar Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($incidenciasValidadas as $incidencia)
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark">{{ $incidencia->titulo }}</div>
                                    <small class="text-muted">{{ Str::limit($incidencia->detalle, 50) }}</small>
                                </td>
                                <td>
                                    <i class="bi bi-geo-alt text-danger me-1"></i>
                                    {{ $incidencia->ubicacion }}
                                </td>
                                <td>{{ $incidencia->fecha }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $incidencia->user_id }}</span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex align-items-center justify-content-end gap-2">

                                        <form action="{{ route('incidencias.actualizar_estado', $incidencia->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <select name ="estado" class="form-select form-select-sm rounded-pill border-primary" style="width: 150px;" onchange="this.form.submit()">
                                                <option value="pendiente" {{ $incidencia->estado == 'pendiente' ? 'selected' : '' }}>
                                                    🟠 Pendiente
                                                </option>
                                                <option value="en_proceso" {{ $incidencia->estado == 'en_proceso' ? 'selected' : '' }}>
                                                    🔵 En proceso
                                                </option>
                                                <option value="solucionado" {{ $incidencia->estado == 'solucionado' ? 'selected' : '' }}>
                                                    🟢 Solucionado
                                                </option>
                                            </select>
                                        </form>

                                        <a href="{{ route('incidencias.detalle', $incidencia->id) }}" class="btn btn-sm rounded-circle">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <i class="bi bi-info-circle display-1 text-muted opacity-25"></i>
                                    <h4 class="mt-3 text-muted">No hay incidencias en seguimiento</h4>
                                    <p class="text-muted small">Primero debes validar incidencias en el panel de revisión.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection