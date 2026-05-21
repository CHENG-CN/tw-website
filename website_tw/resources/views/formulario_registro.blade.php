@extends('layouts.default')
@section('content')

    @auth 

    <div class="alert alert-danger rounded-4">
            Ya está registrado
    </div>
    @else
    <form method="POST" action="{{ route('register.post') }}">
    <div class="container">

        <div class="row mb-3">
            <h2> Registrarse en el sistema </h2>
        </div>

        <div class="row mb-3 g-3"> 

            <div class="form-floating col-12 col-md-6 ">
                <input id="name" name="name" type="string"
                        placeholder="Ej. José Pérez" 
                        class="form-control" required>
                <label for="nombre"> Nombre: </label>
            </div> 
        </div>

        <div class="row mb-3 g-3"> 
            <div class="form-floating col-12 col-md-6 ">
                <input id="password" name="password" type="string"
                        placeholder="tw_1234" 
                        class="form-control" required>
                <label for="password"> Contraseña: </label>
            </div> 
        </div>

        <div class="row mb-3 g-3">
            <div class="form-floating col-12 col-md-6 ">
                <input id="email" name="email" type="email" 
                    placeholder="tucorreo@dominio.es" 
                    pattern="[a-z0-9.-]+@[a-z0-9.-]+"
                    class="form-control" required>
                <label for="email"> Correo: </label>
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

    @endauth

@endsection
