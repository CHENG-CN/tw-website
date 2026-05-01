<!DOCTYPE html>
<html lang="es">
<head> <!-- configuración invisibles-->
    <meta charset="UTF-8" />    <!--tipo de codificación-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  <!-- adaptabilidad-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


    <title> @yield('title', 'Incidencias-ayuntamiento') ?></title> <!-- Esto no muestra el titulo-->
</head>

<body>
    <header>
        <h1 class="text-center my-3">  {{ config('app.name') }}</h1>
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