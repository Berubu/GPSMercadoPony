@extends('layouts.app')

@section('content')
    <x-header />
    <div class="flex justify-center items-center bg-custom-gray min-h-screen">
        <div class="bg-gray-200 p-8 rounded-lg shadow-md w-full" style="max-width: 30rem;">
            <div class="flex flex-col items-center mb-6">
                <div class="w-20 h-20 bg-custom-blue rounded-full"></div>
                <button class="text-gray-700 text-sm mt-2">Editar foto de perfil</button>
                <button class="text-gray-700 text-sm">Eliminar foto</button>
            </div>
            <div class="flex flex-col gap-4">
                <button class="bg-custom-blue text-white py-3 rounded-lg w-full">Compras realizadas</button>
                <button class="bg-custom-blue text-white py-3 rounded-lg w-full">Mis productos</button>
                <button class="bg-custom-blue text-white py-3 rounded-lg w-full">Mis facturas</button>
            </div>
            <button class="bg-red-700 text-white py-3 rounded-lg mt-6 w-full">
                Eliminar cuenta
            </button>
        </div>
    </div>
    <x-footer />
@endsection
