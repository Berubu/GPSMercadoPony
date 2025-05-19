<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Lista de Compras</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID Compra</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Usuario</th>
                <th>Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
                <tr>
                    <td>{{ $compra->idCompra }}</td>
                    <td>{{ $compra->fechaCompra }}</td>
                    <td>${{ number_format($compra->total, 2) }}</td>
                    <td>{{ $compra->usuario->nombreCompleto }}</td>
                    <td>{{ $compra->producto->nombreProducto }}</td>
                    <td>
                        <a href="{{ route('compras.invoice', $compra->idCompra) }}" class="btn btn-primary" style="background-color: #53102D; border-color: #53102D;">Obtener Factura</a>
                        <a href="{{ route('compras.xml', $compra->idCompra) }}" class="btn btn-secondary">Obtener Factura (XML)</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
