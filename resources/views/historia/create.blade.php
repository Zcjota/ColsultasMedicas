<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear historia para paciente </title>

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
      <a class="navbar-brand" href="#">Consultorio Médico</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('historia.index') }}">historia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('historia.create') }}">Agendar Cita</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Crear historia</h2>

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('historia.store') }}">

      @csrf

      <div class="mb-3">
        <label>Fecha Elaboración</label>
        <input type="date" name="fecha_elaboracion" class="form-control" value="{{ old('fecha_elaboracion', now()->toDateString()) }}">
      </div>

      <div class="mb-3">
  <label>Hora</label>
  @php
    $currentTime = now();
    $formattedTime = $currentTime->format('H:i');
  @endphp
  <input type="time" name="hora" class="form-control" value="{{ old('hora', $formattedTime) }}">
</div>


      <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <label>Diagnóstico</label>
        <input type="text" name="diagnostico" class="form-control">
      </div>

      <div class="mb-3">
        <label>Tratamiento</label>
        <input type="text" name="tratamiento" class="form-control">
      </div>

      <div class="mb-3">
        <label>Médico</label>
        <select name="usuario_id" class="form-select">
          @foreach($usuarios as $usuario)
            <option value="{{$usuario->id}}">Dr. {{$usuario->nombre}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label>Paciente</label>
        <select name="paciente_id" class="form-select">
          @foreach($pacientes as $paciente)
            <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="{{ route('historia.index') }}" class="btn btn-secondary">Volver</a>

    </form>

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
