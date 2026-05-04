<!DOCTYPE html>
<html lang="es">
{{--
<head> <!-- configuración invisibles-->
    <meta charset="UTF-8" />    <!--tipo de codificación-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  <!-- adaptabilidad-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


    <title> @yield('title', 'Incidencias-ayuntamiento') ?></title> <!-- Esto no muestra el titulo-->
    
</head>

<body>
    <header>
        <h1 class="text-center my-3">  @yield('titulo_pagina', config('app.name'))</h1>
        <nav class="navbar navbar-expand-lg text-primary-emphasis bg-primary-subtle">
            <div class="container-fluid">

                <a class="navbar-brand"> Menú </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class='collapse navbar-collapse' id='navmenu'>
                     <ul class='navbar-nav'>

                        @foreach(config('paginas.menu') as $ruta => $nombre)
                            <li class='nav-item'>
                                <a class="nav-link  {{ request()->routeIs($ruta) ? 'active' : '' }} " href="{{ route($ruta) }}"> {{ $nombre }} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="bg-body-secondary p-4 my-3 container">
        @yield('content')
    </main>

    <footer class="p-2 text-info-emphasis bg-info-subtle">
        <p>&copy; 2026 Grupo 6 TW. Todos los derechos reservados. </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
--}}
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <title>@yield('title', 'Incidencias Ayuntamiento')</title>

    <style>
    :root {
        --gh-primary: #0056b3;
        --gh-secondary: #e7f1ff;
        --gh-dark: #002d5e;
        --gh-bg-main: #f0f5ff;
        --gh-text-main: #1a2a3a;
        --font-family-sans-serif: 'Inter', sans-serif;
    }

    body {
        font-family: var(--font-family-sans-serif);
        background-color: var(--gh-bg-main);
        color: var(--gh-text-main);
    }

    .navbar-custom {
        background-color: #ffffff !important;
        border-bottom: 3px solid var(--gh-primary);
        padding-top: 1rem;
        padding-bottom: 1rem;
    }
    .navbar-custom .navbar-brand {
        color: var(--gh-primary) !important;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .navbar-custom .nav-link {
        color: var(--gh-text-main) !important;
        font-weight: 600;
    }
    .navbar-custom .nav-link.active {
        color: var(--gh-primary) !important;
        background-color: var(--gh-secondary);
        border-radius: 8px;
    }

    .btn-gh-primary {
        background-color: var(--gh-primary);
        color: #ffffff;
        border-radius: 10px;
        padding: 0.5rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-gh-primary:hover {
        background-color: var(--gh-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 86, 179, 0.3);
        color: white;
    }

    .gh-main-content {
        background-color: #ffffff;
        border-radius: 1.5rem;
        box-shadow: 0 15px 35px rgba(0, 45, 94, 0.1);
        border: 1px solid var(--gh-secondary);
        padding: 3rem !important;
    }
    h1, h2, h3 {
        color: var(--gh-dark);
        font-weight: 700;
    }

    footer.gh-footer {
        background-color: var(--gh-dark);
        color: #ffffff;
        margin-top: 4rem;
        padding: 3rem 0;
    }
    footer.gh-footer .text-muted {
        color: #a0c4ff !important;
    }
</style>
</head>

<body>
    <header class="mb-5 shadow-sm">
        {{-- Título principal (solo para el Home, o lo dejas si te gusta) --}}
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
            <p>&copy; 2026 Grupo 6 TW. Todos los derechos reservados. </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>