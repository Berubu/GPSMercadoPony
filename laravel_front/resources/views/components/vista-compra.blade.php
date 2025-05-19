@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<x-header />
<div class="container-fluid d-flex flex-column min-vh-100" style="background-color: #222222; min-height: 35vh;">

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card h-70">
                <div class="card-body d-flex flex-column">
                    <div class="row">
                        <!-- Columna de la imagen -->
                        <div class="col-md-2">
                            <img src="{{ asset('img/' . $producto->idProducto . '.jpg') }}" class="d-block w-100" alt="Imagen del producto" style="object-fit: cover;">
                        </div>
                        <!-- Columna del texto -->
                        <div class="col-md-10">
                            <h5 class="card-title">{{ $producto->nombreProducto }}</h5> {{-- Nombre del producto --}}
                            <h6 class="card-subtitle mb-2 text-body-secondary">${{ number_format($producto->precio, 2) }}</h6> {{-- Precio --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card h-70 mt-3">
                <div class="card-body d-flex flex-column">
                    <div>
                        <h5 class="card-title">
                            <input type="radio" id="enviar" name="metodo_entrega" value="enviar" class="me-2" onchange="calcularTotal()">
                            <label for="enviar">Enviar a Domicilio</label>
                        </h5>
                        <p class="card-text">Dirección Genérica</p>
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            <a href="">Editar Dirección</a>
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card h-30 mt-3">
                <div class="card-body d-flex flex-column">
                    <div>
                        <h5 class="card-title">
                            <input type="radio" id="recoger" name="metodo_entrega" value="recoger" class="me-2" onchange="calcularTotal()">
                            <label for="recoger">Recoger en punto de entrega</label>
                        </h5>
                        <p class="card-text">A acordar con el vendedor</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Forma de Pago</h5>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">Transferencia SPEI</a>
                        <a href="#" class="list-group-item list-group-item-action">Tarjeta de Crédito/Débito</a>
                    </div>
                    <p class="card-text mt-3">Resumen de Compra</p>
                    <p class="card-text" id="productoPrecio">Producto: ${{ number_format($producto->precio, 2) }}</p>
                    <p class="card-text" id="envioPrecio">Envío: $50</p>
                    <p class="card-text" id="totalPrecio">Total: ${{ number_format($producto->precio + 50, 2) }}</p>
                    <button
                        type="button"
                        class="btn btn-primary btn-lg mb-3"
                        onclick="window.location.href='http://localhost:5174/factura'"
                    >
                        Confirmar Compra
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
<script>
    // Función para actualizar el total basado en el método de entrega seleccionado
    function calcularTotal() {
        const precioProducto = {{ $producto->precio }};
        let costoEnvio = 50; // Valor por defecto para el envío a domicilio

        // Verificar cuál método de entrega ha sido seleccionado
        if (document.getElementById('recoger').checked) {
            costoEnvio = 0; // Si se elige "Recoger", el envío es gratis
        }

        // Actualizar el precio de envío
        document.getElementById('envioPrecio').innerText = "Envío: $" + costoEnvio;

        // Calcular el total
        const total = precioProducto + costoEnvio;
        document.getElementById('totalPrecio').innerText = "Total: $" + total.toFixed(2);
    }
</script>
