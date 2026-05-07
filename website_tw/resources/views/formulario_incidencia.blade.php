@extends('layouts.default')
@section('content')

    <form method="POST" action="{{ route('incidencias.post') }}" enctype="multipart/form-data">
    <div class="container">

        <div class="row mb-3">
            <h2> Reportar una incidencia </h2>
        </div>

        <div class="row mb-3 g-3"> 

            <div class="form-floating col-12 col-md-6 ">
                <input id="ubicacion" name="ubicacion" type="text" 
                        placeholder="Ej. Calle Periodista Daniel Saucedo Aranda s/n. E-18071"
                        class="form-control" required>
                <label for="ubicacion"> Ubicación: </label>
            </div>

            <div class="form-floating col-12 col-md-6 ">
                <input id="fecha" name="fecha" type="date"
                        placeholder="dd/mm/yyyy"
                        class="form-control" required>
                <label for="fecha"> Fecha: </label>
            </div>
        </div>

        <div class="row mb-3 g-3">

            <div class="form-floating col-12 col-md-6 ">
                <textarea id="descripcion" name="descripcion" 
                    class="form-control" 
                    placeholder="Descripción de la incidencia..."
                    style="height: 100px" required></textarea>
                <label for="descripcion"> Descripción: </label>
            </div>

            <div class="form-floating col-12 col-md-6 ">
                <input id="fotografia" name="fotografia" type="file"
                    placeholder="https://webejemplo.com/imagen.jpg"
                    class="form-control" 
                    accept="image/*" required>
                <label for="fotografia"> Fotografía de la incidencia: </label>
            </div>
        </div>

        <div class="row mb-3 g-3"> <!-- terminos y condiciones -->
            <div class="form-check">
                <input class="form-check-input" value="" id="condiciones" name="condiciones" type="checkbox">
                <label class="form-check-label" for="condiciones"> Aceptar términos y condiciones </label>
            </div>
        </div>

        <div class="col-12 col-md-auto">
            <button type="submit" class="btn btn-primary w-100 w-md-auto">Enviar </button>
        </div>
    </div>
    </form>

@endsection
