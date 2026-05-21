@extends('layouts.default')
@section('content')

<form method="POST" action="{{ route('login.post') }}">
<div class="container">

    <div class="row mb-3">
        <h2> Autentificación </h2>
    </div>

    <div class="row mb-3 g-3"> 

        <div class="form-floating col-12 col-md-6 ">
            <!-- este patrón no es restrictivo con las mayúsculas y minúsculas-->
            <input id="email" name="email" type="email" 
                    placeholder="Ej. pepito@dominio.es" 
                    pattern="[a-z0-9.-]+@[a-z0-9.-]+" 
                    class="form-control" required>
            <label for="email"> Correo electrónico: </label>
        </div>

        <div class="form-floating col-12 col-md-6 ">
            <input id="password" name="password" type="text"
                    placeholder="a_password"
                    pattern="[a-z0-9.-]+@[a-z0-9.-]+" 
                    class="form-control" required>
            <label for="password"> Contraseña: </label>
        </div> 
    </div>


    <div class="row mb-3 g-3"> <!-- terminos y condiciones -->
        <div class="form-check">
            <input class="form-check-input" value="" id="condiciones" name="condiciones" type="checkbox">
            <label class="form-check-label" for="condiciones"> Aceptar términos y condiciones </label>
        </div>
    </div>

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row mt-4">
            <div class="col-12 col-md-auto">
                <button type="submit" class="btn btn-primary d-block w-100 px-4">
                    Enviar
                </button>
            </div>
        </div>
    <div class="mt-3 pt-1">
        <span class="text-muted small">
            ¿No estás registrado? 
            <a href="{{ route('formulario_registro') }}" class="text-primary fw-bold text-decoration-none ms-1">
                Registrarse
            </a>
        </span>
    </div>
</div>
</form>

@endsection