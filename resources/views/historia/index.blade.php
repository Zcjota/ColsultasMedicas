<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Médico - historia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            padding-top: 56px; 
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
                    <a class="nav-link" href="{{ route('historia.index') }}">historia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('historia.create') }}">Crear Historia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/recetario">Ver recetas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pacientes">Pacientes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
<h2>Historias Clínicas</h2>
    
    @if (session('status'))
      <div class="alert alert-success">  
        {{ session('status') }}
      </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Descripcion</th>
                <th>Diagnostico</th>
                <th>Dr</th>
                <th>Paciente</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historia as $historia)
                <tr>
                    <td>{{ $historia->id }}</td>
                    <td>{{ $historia->fecha_elaboracion }}</td>
                    <td>{{ $historia->hora }}</td>
                    <td>{{ $historia->descripcion }}</td>
                    <td>{{ $historia->diagnostico }}</td>
                    <td>{{ $historia->tratamiento }}</td>
                    <td>{{ $historia->usuario->nombre }}</td> 
                    <td>{{ $historia->paciente->nombre }}</td>
                    <td>
                        <a href="{{ route('historia.show', $historia->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('historia.edit', $historia->id) }}" class="btn btn-warning" >Editar</a>

                        <form action="{{ route('historia.destroy', $historia->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este ?')">Eliminar</button>
                </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.btn').hover(function() {
            $(this).addClass('animate__animated animate__pulse')
        }, function() {
            $(this).removeClass('animate__animated animate__pulse')
        })
    })
</script>

</body>
</html>