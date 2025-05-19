
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="container-fluid" style="background-color: #222222; min-height: 100vh;">
    <div class="row">
        <!-- Sección principal del producto -->
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <div class="row">
                        <!-- Carrusel de imágenes -->
                        <div class="col-md-6">
                            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner" style="height: 400px;">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('img/' . $producto->idProducto . '.jpg') }}" class="d-block w-100" alt="..." style="object-fit: cover; height: 100%;">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                        <!-- Detalles del producto -->
                        <div class="col-md-6">
                            <h5 class="card-title">{{ $producto->nombreProducto }}</h5> {{-- Nombre del producto --}}
                            <h6 class="card-subtitle mb-2 text-body-secondary">${{ $producto->precio }}</h6> {{-- Precio --}}
                            <p class="card-text">{{ $producto->descripcion }}</p> {{-- Descripción --}}
                        </div>
                    </div>
                    <p class="card-text mt-auto">Vendedor: Usuario {{ $producto->idUsuario }}</p> {{-- ID del vendedor --}}
                </div>
            </div>
        </div>

        <!-- Métodos de pago y botón de compra -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                        <button type="button" class="btn btn-primary btn-lg mb-3" onclick="window.location.href='{{ url('/vista-compra/' . $producto->idProducto) }}'">
                            Comprar
                        </button>




                    <h5 class="card-title">Métodos de Pago:</h5>
                    <p class="card-text">
                        Depósito<br>
                        Transferencia<br>
                        PayPal<br>
                        Tarjeta de crédito<br>
                        Tarjeta de débito
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

