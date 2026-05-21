@extends('layouts.default')
@section('content')

    <div class="container my-4">
        <h1 class="mb-4">Incidencias del municipio</h1>
        
        <form action="{{ route('lista_incidencias') }}" method="GET" class="d-flex justify-content-start mb-4 mx-2">
            <div class="row align-items-end">
                <select name="estado" id="estado" class="form-select form-select-sm rounded-pill border-primary" style="width: 200px;" onchange="this.form.submit()">
                    <option value="">Cualquier estado</option>
                    <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_proceso" {{ request('estado') == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="solucionado" {{ request('estado') == 'solucionado' ? 'selected' : '' }}>Solucionado</option>
                </select>
            </div>
        </form>
        

        <div class="row g-4">

            @forelse($incidencias_filtradas as $incidencia)
               <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <x-tarjeta eliminar="false" :incidencia="$incidencia"/>
                </div>
            @empty

                <p>No hay incidencias.</p>
            @endforelse
        </div>
    </div>
@endsection