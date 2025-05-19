<header class="custom-header flex justify-between items-center p-4 text-white bg-custom-red">
    <div class="max-w-xs cursor-pointer">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/Logo B Transparente.png') }}" alt="MercadoPony" class="w-20 h-auto" />
        </a>
    </div>
    <div class="flex items-center w-1/2">
        <form action="{{ route('buscar') }}" method="GET" class="flex w-full">
            <input
                type="text"
                name="q"
                placeholder="Buscar... "
                value="{{ request('q') }}"
                class="bg-custom-blue block w-full border border-slate-300 rounded-md shadow-sm focus:outline-none focus:border-custom-red focus:ring-custom-wine focus:ring-1 sm:text-sm"
            />
            <button
                type="submit"
                class="ml-2 px-4 py-2 bg-custom-red text-white font-bold rounded-md hover:bg-red-600 focus:outline-none"
            >
                <img src="{{ asset('img/search.png') }}" alt="MercadoPony" class="w-5 h-auto" />
            </button>
        </form>
    </div>
    <div class="auth-buttons flex space-x-2">
        @auth
            {{-- Usuario autenticado --}}
            <a href="/perfil" class="text-white font-bold hover:underline">
                Bienvenido, {{ auth()->user()->NombreUsuario }}
            </a>

            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button
                    type="submit"
                    class="custom-button bg-custom-blue hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
                >
                    Logout
                </button>
            </form>
        @else
            {{-- Usuario no autenticado --}}
            <button class="custom-button bg-custom-blue hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                <a href="{{ route('components.crear') }}">Crear Cuenta</a>
            </button>
            <button class="custom-button bg-custom-blue hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                <a href="{{ route('components.login') }}">Login</a>
            </button>
        @endauth
    </div>
</header>
