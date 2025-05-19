<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Lista de Usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Pass</th>
                <th>Nombre Completo</th>
                <th>Fecha de Registro</th>
                <th>Estrellas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->idUsuario }}</td>
                    <td>{{ $usuario->NombreUsuario }}</td>
                    <td>{{ $usuario->password }}</td>
                    <td>{{ $usuario->nombreCompleto }}</td>
                    <td>{{ $usuario->fechaRegistro }}</td>
                    <td>{{ $usuario->estrellas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
