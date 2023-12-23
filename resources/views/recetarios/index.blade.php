<!-- resources/views/recetarios/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Médico - Recetarios</title>
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
        <a class="navbar-brand" href="/">Consultorio Médico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Puedes ajustar las rutas según tus necesidades -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recetario.index') }}">Recetarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recetario.create') }}">Crear Recetario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/historia">Crear Histoias para pacientes</a>
                </li>
                <!-- Puedes agregar más enlaces de navegación según sea necesario -->
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>Recetarios</h2>
    <div class="container mt-5">
    <h2>Recetarios</h2>
    <form action="{{ route('recetario.index') }}" method="GET">

        <div class="input-group mb-3">

            <!-- Combo para filtrar por paciente -->
            <select class="form-select" name="paciente_id">
                <option value="">Seleccionar Paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                @endforeach
            </select>

            <!-- Combo para filtrar por usuario -->
            <select class="form-select" name="usuario_id">
                <option value="">Seleccionar Usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>

            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    @if(count($recetarios) > 0)
    <h3>Resultados de la búsqueda:</h3>
    <ul>
        @foreach($recetarios as $recetario)
            <li>{{ $recetario->historia->paciente->nombre }} - {{ $recetario->historia->descripcion }}</li>
        @endforeach
    </ul>
@else
    <p>No se encontraron resultados.</p>
@endif

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Historia Asociada</th>
                <!-- Agrega más encabezados según sea necesario -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recetarios as $recetario)
                <tr>
                    <td>{{ $recetario->id }}</td>
                    <td>{{ $recetario->historia->descripcion }}</td>
                    <!-- Agrega más celdas según sea necesario -->
                    <td>
                        <a href="{{ route('recetario.show', $recetario->id) }}" class="btn btn-info" role="button">Ver</a>
                        <a href="{{ route('recetario.edit', $recetario->id) }}" class="btn btn-warning" role="button">Editar</a>

                        <!-- Agregar el botón Eliminar -->
                        <form action="{{ route('recetario.destroy', $recetario->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este recetario?')">Eliminar</button>
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
