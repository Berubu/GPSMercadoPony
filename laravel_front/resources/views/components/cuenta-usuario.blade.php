@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MercadoPony')</title>
</head>
<body>
    <header>
        @include('components.header')
    </header>
    <main>
        @include('usuarios.cuenta')
    </main>
    <footer>
        @include('components.footer')
    </footer>
</body>
</html>
