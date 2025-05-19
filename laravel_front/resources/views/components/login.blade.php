@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-header />
<div class="flex items-center justify-center min-h-screen bg-custom-gray">
    <form
        action="{{ route('components.login') }}" {{-- Ruta de tu formulario --}}
        method="POST"
        class="bg-custom-blue p-8 rounded-lg shadow-md w-[30rem] text-white"
    >
        @csrf
        <h2 class="mb-6 text-center text-lg font-bold">
            Ingresa tu usuario y contraseña para iniciar sesión
        </h2>

        <label class="block mb-2">Usuario</label>
        <input
            type="text"
            name="username"
            value="{{ old('username') }}"
            class="w-full mb-4 px-3 py-2 rounded-md text-black"
            placeholder="Usuario"
        />
        @error('username')
            <p class="text-red-500">{{ $message }}</p>
        @enderror

        <label class="block mb-2">Contraseña</label>
        <input
            type="password"
            name="password"
            class="w-full mb-4 px-3 py-2 rounded-md text-black"
            placeholder="Contraseña"
        />
        @error('password')
            <p class="text-red-500">{{ $message }}</p>
        @enderror

        <div class="flex items-center justify-end mt-8 mb-4">
            <button
                type="submit"
                class="bg-custom-red hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-md"
            >
                Login
            </button>
        </div>
    </form>
</div>
<x-footer />
