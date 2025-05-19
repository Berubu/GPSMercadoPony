    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<header >
    <div class="logo">
        <img src="/path-to-logo.png" alt="Logo" /> <!-- Cambia "path-to-logo" por la ruta real -->
        <h1>mercado pony</h1>
    </div>
    <div class="search">
        <input type="text" placeholder="Buscar..." />
        <button>🔍</button>
    </div>
    <div class="auth-buttons">
        <a href="{{ route('register') }}" class="btn btn-primary">Crear Cuenta</a>
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </div>
</header>
