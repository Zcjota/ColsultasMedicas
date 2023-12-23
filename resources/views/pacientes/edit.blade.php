<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>Editar Paciente</title>

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
            <a class="nav-link" href="{{ route('pacientes.index') }}">Pacientes</a>
          </li>

          <li class="nav-item">  
            <a class="nav-link" href="{{ route('pacientes.create') }}">Agregar Paciente</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">

    <h2>Editar Paciente</h2>

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('pacientes.update', $paciente->id) }}">
      @csrf 
      @method('PUT')

      <div class="row">

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $paciente->nombre }}">
          </div>
          
          <div class="mb-3">
            <label class="form-label">Fecha de Nacimiento</label>  
            <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $paciente->fecha_nacimiento }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Sexo</label>
            <select class="form-select" name="sexo">
              <option value="M" {{ $paciente->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
              <option value="F" {{ $paciente->sexo == 'F' ? 'selected' : '' }}>Femenino</option>
            </select>
          </div>

          <!-- Otros campos del paciente -->

        </div>

        <div class="col-md-6">

          <div class="mb-3">
            <label class="form-label">Edad</label>
            <input type="number" class="form-control" name="edad" value="{{ $paciente->edad }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Número de Identificación</label>
            <input type="number" class="form-control" name="id_num" value="{{ $paciente->id_num }}">
          </div>

          <!-- Otros campos del paciente -->

        </div>

      </div>

      <!-- Agrega aquí los campos adicionales del paciente -->

      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>

  </div>

  <!-- Scripts JS -->

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
