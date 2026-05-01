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

    <div class="col-12 col-md-auto">
        <button type="submit" class="btn btn-primary w-100 w-md-auto">Enviar </button>
    </div>
</div>
</form>

@endsection