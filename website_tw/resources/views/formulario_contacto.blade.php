@extends('layouts.default')
@section('content')

    <form method="POST" action="{{ route('contacto.post') }}">
    <div class="container">

        <div class="row mb-3">
            <h2> Formulario de Contacto </h2>
        </div>

        <div class="row mb-3 g-3"> 

            <div class="form-floating col-12 col-md-6 ">
                <input id="nombre" name="nombre" type="text"
                        placeholder="Ej. José Pérez" 
                        class="form-control" required>
                <label for="nombre"> Nombre y Apellidos: </label>
            </div> 

            <div class="form-floating col-12 col-md-6 ">
                <input id="email" name="email" type="email" 
                    placeholder="tucorreo@dominio.es" 
                    pattern="[a-z0-9.-]+@[a-z0-9.-]+"
                    class="form-control" required>
                <label for="email"> Correo de contacto: </label>
            </div>
        </div>
        <div class="row mb-3 g-3">
            <div class="form-floating col-12 col-md-6 ">
                <input id="telefono" name="telefono" type="tel" 
                    placeholder="Ej. +34 600 123 456" 
                    pattern="\+?[0-9\s\-]+"
                    class="form-control" required>
                <label for="telefono"> Teléfono de contacto: </label>
            </div>

            <div class="form-floating col-12 col-md-6 ">
                <select class="form-select" id="descubierto" name="descubierto" required>
                    <option value="">Selecione una opción...</option>
                    <option value="redes">Redes sociales</option>
                    <option value="amigos">Amigos o familiares</option>
                    <option value="busqueda">Búsqueda en internet</option>
                    <option value="otros">Otros</option>
                </select>
                <label for="descubierto"> ¿Cómo ha descubierto esta página?</label>
            </div>
        </div>

        <div class="row mb-3 g-3">
            <div class="form-floating col-12">
                <textarea id="asunto" name="asunto" type="text"
                        class="form-control" 
                        style="height: 100px"
                        placeholder="Texto"
                        required></textarea>
                <label for="asunto"> Asunto: </label>
            </div>
        </div>

        <div class="row mb-3 g-3"> <!-- terminos y condiciones -->
            <div class="form-check">
                <input class="form-check-input" value="" id="condiciones" name="condiciones" type="checkbox">
                <label class="form-check-label" for="condiciones"> Aceptar términos y condiciones </label>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 col-md-auto">
                <button type="submit" class="btn btn-primary d-block w-100 px-4">
                    Enviar
                </button>
            </div>
        </div>
    </div>
    </form>

@endsection
