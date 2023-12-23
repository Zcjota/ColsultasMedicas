<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Médico - Pacientes</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pacientes.index') }}">Pacientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pacientes.create') }}">Crear Paciente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/citas">Crear citas</a>
                </li>
                <!-- Puedes mantener tus otros enlaces de navegación aquí -->
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>Pacientes</h2>
    
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Fecha de Nacimiento</th>
            <th>Edad</th>
            <th>Identificación</th>
            <th>Aseguradora</th>
            <th>Email</th>
            <th>Domicilio</th>
            <th>Teléfono</th>
            <!-- Agrega más columnas según la información que desees mostrar -->
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->id }}</td>
                <td>{{ $paciente->nombre }}</td>
                <td>{{ $paciente->sexo }}</td>
                <td>{{ $paciente->fecha_nacimiento }}</td>
                <td>{{ $paciente->edad }}</td>
                <td>{{ $paciente->id_num }}</td>
                <td>{{ $paciente->aseguradora }}</td>
                <td>{{ $paciente->email }}</td>
                <td>{{ $paciente->domicilio }}</td>
                <td>{{ $paciente->telefono }}</td>
                <!-- Agrega más columnas según la información que desees mostrar -->
                <td>
                    <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info" role="button">Ver</a>
                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning" role="button">Editar</a>

                    <!-- Agregar el botón Eliminar -->
                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este paciente?')">Eliminar</button>
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
