<!-- resources/views/rolusuarios/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Médico - Roles de Usuarios</title>
    <!-- Enlace a Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            padding-top: 56px; /* Altura de la barra de navegación */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/usuarios">Consultorio Médico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rolusuarios.create') }}">Crear Rol para Usuario</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>Roles de Usuarios</h2>
    
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre del Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rolesUsuarios as $rolUsuario)
                <tr>
                    <td>{{ $rolUsuario->usuario_id }}</td>
                    <td>{{ $rolUsuario->usuario->nombre }}</td>
                    <td>{{ $rolUsuario->nombre_rol }}</td>
                    <td>
                        <a href="{{ route('rolusuarios.edit', $rolUsuario->usuario_id) }}" class="btn btn-warning" role="button">Editar</a>

                        <!-- Agregar el botón Eliminar -->
                        <form action="{{ route('rolusuarios.destroy', $rolUsuario->usuario_id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este rol de usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Scripts de Bootstrap y JavaScript desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tC8A9ZvZDvQKtDBLxCvG4rN8s24TQgY5nE6/A=" crossorigin="anonymous"></script>

<script>
    // Agregar animaciones básicas a los botones
    $(document).ready(function () {
        $('.btn').hover(function () {
            $(this).addClass('animate__animated animate__pulse');
        }, function () {
            $(this).removeClass('animate__animated animate__pulse');
        });
    });
</script>

</body>
</html>
