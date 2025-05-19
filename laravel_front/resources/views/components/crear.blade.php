@extends('layouts.app')

<x-header />
<div class="flex items-center justify-center min-h-screen bg-custom-gray">
    <form
        action="{{ route('register') }}" {{-- Ruta de registro --}}
        method="POST"
        class="bg-custom-blue p-8 rounded-lg shadow-md w-[30rem] text-white"
    >
        @csrf
        <h2 class="mb-6 text-center text-lg font-bold">
            Ingresa tus datos para crear tu cuenta
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

        <label class="block mb-2">Nombre Completo</label>
        <input
            type="text"
            name="fullName"
            value="{{ old('fullName') }}"
            class="w-full mb-4 px-3 py-2 rounded-md text-black"
            placeholder="Nombre Completo"
        />
        @error('fullName')
            <p class="text-red-500">{{ $message }}</p>
        @enderror

        <label class="block mb-2">Correo Electrónico</label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            class="w-full mb-4 px-3 py-2 rounded-md text-black"
            placeholder="Correo Electrónico"
        />
        @error('email')
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

        <label class="block mb-2">Confirmar Contraseña</label>
        <input
            type="password"
            name="password_confirmation"
            class="w-full mb-4 px-3 py-2 rounded-md text-black"
            placeholder="Confirmar Contraseña"
        />

        @error('password_confirmation')
            <p class="text-red-500">{{ $message }}</p>
        @enderror

        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <input
                    type="checkbox"
                    name="termsAccepted"
                    id="termsAccepted"
                    class="mr-2"
                />
                <label for="termsAccepted">Acepto los términos y condiciones</label>
            </div>
            <button
                type="submit"
                class="bg-custom-red hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-md"
            >
                Crear Cuenta
            </button>
        </div>
    </form>
</div>
<x-footer />
