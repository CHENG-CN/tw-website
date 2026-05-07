<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>@yield('title', 'Incidencias Ayuntamiento')</title>

</head>

<body>
    <header class="mb-5 shadow-sm">
        {{-- <h1 class="text-center my-3 text-primary-emphasis fw-bold">@yield('titulo_pagina', 'Incidencias Granada')</h1> --}}
        
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="bi bi-cone text-danger me-1"></i> Menu
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class='collapse navbar-collapse' id='navmenu'>
                    <ul class='navbar-nav me-auto'>
                        @foreach(config('paginas.menu') as $ruta => $nombre)
                            <li class='nav-item'>
                                <a class="nav-link {{ request()->routeIs($ruta) ? 'active' : '' }}" href="{{ route($ruta) }}"> 
                                    {{ $nombre }} 
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="d-flex align-items-center">
                        @if(session()->has('user'))
                            <span class="navbar-text me-4 text-muted small">
                                <i class="bi bi-person me-1"></i> Hola, <strong>{{ session('user') }}</strong>
                            </span>
                            <a href="{{ route('logout') }}" class="btn btn-gh-danger btn-sm">
                                <i class="bi bi-box-arrow-right me-1"></i> Salir
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-gh-primary btn-sm">
                                Iniciar Sesión <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>

    {{-- min-vh-100 ayuda a que el footer no se suba si hay poco contenido --}}
    <main class="gh-main-content my-3 container" style="min-height: 65vh;">
        @yield('content')
    </main>
<footer class="gh-footer py-5 text-center">
    <div class="container">
        <p class="mb-2">&copy; 2026 Grupo 6 TW. Todos los derechos reservados.</p>
        
        <p class="small text-muted mb-4">
            Desarrollado por: 
            <span class="text-white">Juan Luis Sánchez Sequera</span>
            <span class="text-white">Chengcheng Liu y</span>  
            <span class="text-white">Huaxiu Zhou</span>
        </p>

        <div class="mt-3">
            <a href="{{ route('formulario_contacto') }}" class="text-decoration-none px-3 border-end">
                <i class="bi bi-person-lines-fill me-1"></i>Contacto
            </a>

            <a href="https://drive.google.com/file/d/1wz0QRc1du3h-s8L-Uf3aN07noKcwuYSk/view?usp=sharing" target="_blank" class="text-decoration-none px-3">
                <i class="bi bi-file-earmark-pdf me-1"></i>Informe del Proyecto
            </a>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>