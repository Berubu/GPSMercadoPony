@extends('layouts.app')

<div class="container-fluid" style="background-color:rgb(218, 209, 209); min-height: 100vh;">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($productos as $producto)
        <a href="{{ route('components.vista-producto-react', $producto->idProducto) }}"
           class="max-w-xs bg-white rounded-xl overflow-hidden m-5 cursor-pointer transform transition duration-300 hover:scale-105">
            <div class="bg-white">
                <img
                    src="{{ asset('img/' . $producto->idProducto . '.jpg') }}"
                    class="w-full h-40 object-contain"
                />
                <div class="p-4 bg-custom-blue text-white">
                    <h3 class="text-lg font-semibold">{{ $producto->nombreProducto }}</h3>
                    <p class="text-sm text-green-400">${{ number_format($producto->precio, 2) }}</p>
                    <p class="text-sm text-blue-400">id: {{ $producto->idProducto }}</p>
                </div>
            </div>
        </a>

        @endforeach
    </div>

    <div class="paginacion mt-4 text-center">
        {{ $productos->links('pagination::bootstrap-4') }}
    </div>
</div>
