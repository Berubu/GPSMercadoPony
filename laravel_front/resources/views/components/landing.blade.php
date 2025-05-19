<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mercado')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        @include('components.header')
    </header>
    <main>
        @include('components.vista-producto')


    </main>
    <footer>
        @include('components.footer')
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
