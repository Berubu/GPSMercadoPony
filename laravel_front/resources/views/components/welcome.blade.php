<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Asegúrate de compilar y vincular tus estilos -->
</head>
<body>
    {{-- Incluir el header como componente global --}}
    @include('header')

    {{-- Contenido dinámico según la ruta --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Incluir el footer como componente global --}}
    @include('footer')
</body>
</html>
