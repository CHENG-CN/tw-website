@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4">
        <h2>Mi Perfil</h2>
        <hr>

        @if(session()->has('user'))
            <div class="alert alert-success">
                <strong>¡Bienvenido!</strong> Has iniciado sesión.
            </div>
            <p><strong>Nombre:</strong> {{session('user')}}</p>
            <p><strong>Email:</strong> (No guardado en sesión)</p>

            <hr>
            <div class="mt-3">
                <a href="{{ route('logout') }}" class="btn btn-danger">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </a>
            </div>
            @else
           <div class="alert alert-danger">
                No hay ninguna sesion activa.
            </div>
            <a href="{{ route('login.post') }}" class="btn btn-primary">Ir al Login</a>

        @endif
    </div>
</div>
@endsection