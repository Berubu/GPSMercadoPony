@extends('layouts.app')
<x-header />
<div class="container-fluid" style="background-color: #222222; min-height: 100vh;">
    <div class="search-results text-white py-8">
        <h2 class="text-2xl font-semibold text-center text-white mb-6">
            Resultados de búsqueda para: "{{ $query }}"
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($productos as $producto)
            <a href="{{ route('components.vista-producto-react', $producto->idProducto) }}" class="max-w-xs bg-white rounded-xl overflow-hidden m-5 cursor-pointer">
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
            @empty
            <p class="text-center text-gray-500">No se encontraron productos para "{{ $query }}"</p>
            @endforelse
        </div>
    </div>
</div>
<x-footer />