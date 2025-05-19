@extends('layouts.app')

<x-header />

<link rel="stylesheet" href="{{ asset('listaprod.css') }}">

<div class="contenido">


    <div class="contenedor-boton transform transition duration-300 hover:scale-105">
<!-- Botón para abrir el formulario modal -->
<button class="buttonNuevo" id="btnPublicarProducto">Publicar Producto</button>
    </div>

<!-- Modal de creación de producto -->
<div class="modal" id="modalFormulario" tabindex="-1" aria-labelledby="modalFormularioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormularioLabel">Crear Producto</h5>
                <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formularioProducto" method="POST" action="{{ route('producto.store') }}">
                @csrf
                <div class="modal-body">
                    <!-- Nombre del producto -->
                    <div class="form-group">
                        <label for="nombreProducto">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
                    </div>

                    <!-- Descripción -->
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>

                    <!-- Precio -->
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" required>
                    </div>

                    <!-- Fecha de publicación (se establecerá automáticamente con JS) -->
                    <div class="form-group" style="display: none;">
                        <label for="fechaPublicacion">Fecha de Publicación</label>
                        <input type="date" class="form-control" id="fechaPublicacion" name="fechaPublicacion">
                    </div>

                    <!-- ID del usuario (esto puede ser recuperado desde el backend o del usuario autenticado) -->
                    <input type="hidden" id="idUsuario" name="idUsuario" value="{{ auth()->user()->idUsuario }}">

                    <div class="form-group">
                            <label for="imagen">Imagen del Producto</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeModalBtn">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Agregar jQuery y Bootstrap JS si no lo tienes -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- Agregar jQuery y Bootstrap JS si no lo tienes -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>



    <div class="container mt-5">
        <h1>Lista de Productos</h1>
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body d-flex">
                            <!-- Imagen del producto en el lado izquierdo -->
                            <div class="mr-3">
                                <img src="{{ asset('img/' . $producto->idProducto . '.jpg') }}" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;" alt="Imagen de {{ $producto->nombreProducto }}">
                            </div>

                            <!-- Información del producto en el lado derecho -->
                            <div>
                                <h5 class="card-title">{{ $producto->nombreProducto }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $producto->descripcion }}</h6>
                                <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                                <p class="card-text"><small class="text-muted">Publicado el {{ $producto->fechaPublicacion }}</small></p>

                                <!-- Botones (sin funcionalidad) -->
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary cursor-pointer transform transition duration-300 hover:scale-105">Editar</button>
                                    <button class="btn btn-danger delete-btn cursor-pointer transform transition duration-300 hover:scale-105" data-id="{{ $producto->idProducto }}">Borrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

<!-- Cargar Bootstrap solo dentro de contenido -->
    <style>
        @import url('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    </style>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Manejo de evento de clic en los botones de borrar
        $('.delete-btn').on('click', function() {
            // Obtener el ID del producto desde el atributo 'data-id'
            var productId = $(this).data('id');

            // Confirmar la eliminación con el usuario
            if (confirm('¿Estás seguro de que quieres eliminar este producto?')) {
                // Hacer la solicitud AJAX para eliminar el producto
                $.ajax({
                    url: '/producto/' + productId,  // Ruta definida en routes/web.php
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'  // Token CSRF para evitar errores de validación
                    },
                    success: function(response) {
                        // Eliminar el producto de la vista (puedes también recargar la lista)
                        alert('Producto eliminado con éxito');
                        location.reload(); // Recarga la página para reflejar el cambio
                    },
                    error: function(xhr, status, error) {
                        alert('Hubo un problema al eliminar el producto');
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Establecer la fecha actual en el campo de "Fecha de Publicación"
        const today = new Date().toISOString().split('T')[0]; // Obtener la fecha en formato YYYY-MM-DD
        $('#fechaPublicacion').val(today);  // Establecerla en el campo de fecha

        // Mostrar el modal al hacer clic en el botón de "Publicar Producto"
        $('#btnPublicarProducto').on('click', function() {
            $('#modalFormulario').fadeIn();  // Muestra el modal
        });

        // Cerrar el modal cuando se haga clic en el botón de "Cerrar"
        $('#closeModal, #closeModalBtn').on('click', function() {
            $('#modalFormulario').fadeOut();  // Oculta el modal
        });

        // Opcional: Al enviar el formulario, realizar la petición AJAX para guardar el producto
        $('#formularioProducto').on('submit', function(e) {
            e.preventDefault();  // Evita el envío tradicional del formulario

            $.ajax({
                url: '{{ route("producto.store") }}',
                type: 'POST',
                data: $(this).serialize(),  // Envía todos los datos del formulario
                success: function(response) {
                    alert('Producto creado exitosamente');
                    $('#modalFormulario').fadeOut();  // Cerrar el modal
                    location.reload();  // Recargar la página después de crear el producto
                },
                error: function(xhr, status, error) {
                    alert('Hubo un error al crear el producto');
                }
            });
        });
    });


    </script>


<x-footer />
