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
            <div class="form-floating col-12">
                <input id="name" name="name" type="text"
                        placeholder="Ej. José Pérez" 
                        class="form-control" required>
                <label for="name" class="ms-2"> <i class="bi bi-person-fill me-1"></i> Nombre: </label>
            </div> 
        </div>

        <div class="row mb-3 g-3">
            <div class="form-floating col-12">
                <input id="email" name="email" type="email" 
                    placeholder="tucorreo@dominio.es" 
                    class="form-control" required>
                <label for="email" class="ms-2"> <i class="bi bi-envelope-fill me-1"></i> Correo: </label>
            </div>
        </div>

        <div class="row mb-3 g-3"> 
            <div class="form-floating col-12">
                <input id="password" name="password" type="password"
                        placeholder="tw_1234" 
                        class="form-control" required>
                <label for="password" class="ms-2"> <i class="bi bi-lock-fill me-1"></i> Contraseña: </label>
            </div> 
        </div>


        <div class="row mb-3 g-3"> 
            <div class="form-check ms-3">
                <input class="form-check-input" value="1" id="condiciones" name="condiciones" type="checkbox" required>
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