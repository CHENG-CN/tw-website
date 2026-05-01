<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Titulo')</title>
    </head>
<body>
    <h1> Este es mi tutulo </h1>
    <nav>
        esto es un menu
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p> esto es un footer</p>
    </footer>
</body>
</html>