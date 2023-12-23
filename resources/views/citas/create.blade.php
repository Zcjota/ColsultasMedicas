<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendar Cita</title>

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
            <a class="nav-link" href="{{ route('citas.index') }}">Citas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('citas.create') }}">Agendar Cita</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Agendar Cita</h2>
    
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
 
    <form method="POST" action="{{ route('citas.store') }}">
      @csrf

      <div class="row">

      <div class="col-md-6">
        <label>Fecha </label>
        <input type="date" name="fecha" class="form-control" value="{{ old('fecha', now()->toDateString()) }}">
      </div>

      <div class="col-md-6">
  <label>Hora</label>
  @php
    $currentTime = now();
    $formattedTime = $currentTime->format('H:i');
  @endphp
  <input type="time" name="hora" class="form-control" value="{{ old('hora', $formattedTime) }}">
</div>


        <div class="col-md-6">
          <div class="mb-3">
            <label for="motivo_consulta" class="form-label">Motivo de Consulta</label>
            <textarea class="form-control" name="motivo_consulta" id="motivo_consulta" rows="3"></textarea>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Médico</label>
            <select class="form-select" name="usuario_id">
              @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Paciente</label>
            <select class="form-select" name="paciente_id">
              @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
              @endforeach  
            </select>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="{{ route('citas.index') }}" class="btn btn-secondary">Volver</a>

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