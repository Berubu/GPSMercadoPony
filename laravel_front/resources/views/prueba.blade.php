<div class="container mt-5">
    <h1>Lista de Productos</h1>
    <div class="row">
        @foreach ($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombreProducto }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">ID: {{ $producto->idProducto }}</h6>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                        <p class="card-text"><small class="text-muted">Publicado el {{ $producto->fechaPublicacion }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
