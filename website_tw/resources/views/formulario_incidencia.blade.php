{{--@extends('layouts.default')
@section('content')

    <form method="POST" action="{{ route('incidencias.post') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">

            <div class="row mb-3">
                <h2> Reportar una incidencia </h2>
            </div>

            <div class="row mb-3 g-3">

                <div class="form-floating col-12 col-md-6">
                    <input id="titulo" name="titulo" type="text" placeholder="Ej. Farola rota en la esquina"
                        class="form-control" required>
                    <label for="titulo" class="ms-2"> Título corto de la incidencia: </label>
                </div>

                <div class="form-floating col-12 col-md-6 ">
                    <input id="direccion_texto" type="text"
                        placeholder="Ej. Calle Periodista Daniel Saucedo Aranda s/n. E-18071" class="form-control" required>
                    <label for="direccion_texto"> Ubicación (Calle y número): </label>
                    
                    <input type="hidden" name="ubicacion" id="ubicacion_coordenadas">
                </div>

                <div class="form-floating col-12 col-md-6 ">
                    <input id="fecha" name="fecha" type="date" placeholder="dd/mm/yyyy" class="form-control" required>
                    <label for="fecha"> Fecha: </label>
                </div>
            </div>

            <div class="row mb-3 g-3">

                <div class="form-floating col-12 col-md-6 ">
                    <textarea id="descripcion" name="descripcion" class="form-control"
                        placeholder="Descripción de la incidencia..." style="height: 100px" required></textarea>
                    <label for="descripcion"> Descripción: </label>
                </div>

                <div class="form-floating col-12 col-md-6 ">
                    <input id="fotografia" name="fotografia" type="file" placeholder="https://webejemplo.com/imagen.jpg"
                        class="form-control" accept="image/*" required>
                    <label for="fotografia"> Fotografía de la incidencia: </label>
                </div>

                <div class="form-floating col-12 col-md-6 ">
                    <input id="info_img" name="info_img" type="text" placeholder="Ej. Detalle del cristal roto de la farola"
                        class="form-control" required>
                    <label for="info_img" class="ms-2"> Describe brevemente lo que se ve en la foto (Accesibilidad):
                    </label>
                </div>
            </div>

            <div class="row mb-3 g-3"> <div class="form-check">
                    <input class="form-check-input" value="" id="condiciones" name="condiciones" type="checkbox">
                    <label class="form-check-label" for="condiciones"> Aceptar términos y condiciones </label>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <button type="submit" class="btn btn-primary w-100 w-md-auto">Enviar </button>
            </div>
        </div>
    </form>

@endsection

<script src="{{ asset('js/geocodificador.js') }}"></script>
--}}
@extends('layouts.default')

@section('content')
<div class="container py-4">

    @if ($errors->any())
        <div class="alert alert-danger rounded-3 mb-4 shadow-sm">
            <h6 class="fw-bold mb-2"><i class="bi bi-exclamation-triangle-fill me-2"></i>Por favor, corrige los siguientes errores:</h6>
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('incidencias.post') }}" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <h2 class="fw-bold text-primary"> <i class="bi bi-megaphone me-2"></i>Reportar una incidencia </h2>
        </div>

        <div class="row mb-3 g-3">
            <div class="form-floating col-12 col-md-6">
                <input id="titulo" name="titulo" type="text" placeholder="Ej. Farola rota en la esquina"
                    class="form-control" value="{{ old('titulo') }}" required>
                <label for="titulo" class="ms-2"> Título corto de la incidencia: </label>
            </div>

            <div class="form-floating col-12 col-md-6">
                <input id="direccion_texto" type="text" placeholder="Ej. Calle Periodista Daniel Saucedo Aranda s/n. E-18071" 
                    class="form-control" value="{{ old('ubicacion') ? explode('|', old('ubicacion'))[0] : '' }}" required>
                <label for="direccion_texto" class="ms-2"> Ubicación (Calle y número): </label>
                
                <input type="hidden" name="ubicacion" id="ubicacion_coordenadas" value="{{ old('ubicacion') }}">
            </div>

            <div class="form-floating col-12 col-md-6">
                <input id="fecha" name="fecha" type="date" placeholder="dd/mm/yyyy" class="form-control" value="{{ old('fecha') }}" required>
                <label for="fecha" class="ms-2"> Fecha: </label>
            </div>
        </div>

        <div class="row mb-3 g-3">
            <div class="form-floating col-12 col-md-6">
                <textarea id="descripcion" name="descripcion" class="form-control"
                    placeholder="Descripción de la incidencia..." style="height: 100px" required>{{ old('descripcion') }}</textarea>
                <label for="descripcion" class="ms-2"> Descripción: </label>
            </div>

            <div class="form-floating col-12 col-md-6">
                <input id="fotografia" name="fotografia" type="file" class="form-control" accept="image/*">
                <label for="fotografia" class="ms-2"> Archivo de imagen (Opcional): </label>
            </div>

            <div class="form-floating col-12 col-md-6">
                <input id="info_img" name="info_img" type="text" placeholder="Ej. Detalle del cristal roto de la farola"
                    class="form-control" value="{{ old('info_img') }}">
                <label for="info_img" class="ms-2"> Descripción de lo que se ve en la foto (Accesibilidad): </label>
            </div>
        </div>

        <div class="row mb-3 g-3"> 
            <div class="form-check ms-3">
                <input class="form-check-input" value="1" id="condiciones" name="condiciones" type="checkbox" required>
                <label class="form-check-label" for="condiciones"> Aceptar términos y condiciones </label>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <button type="submit" class="btn btn-primary btn-lg w-100 w-md-auto px-4 shadow-sm">
                    <i class="bi bi-cloud-arrow-up-fill me-2"></i> Enviar Reporte
                </button>
            </div>
        </div>
    </form>

</div>
@endsection

<script src="{{ asset('js/geocodificador.js') }}"></script>