<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>Editar Historia</title>

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
         
          <!-- ... (omitido para brevedad) -->

        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">

    <h2>Editar Historia</h2>

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="/historia/{{ $historia->id }}">
  @csrf 
  @method('PUT')

      <div class="row">

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Fecha Elaboración</label>
            <input type="date" class="form-control" name="fecha_elaboracion" value="{{ $historia->fecha_elaboracion }}">
          </div>
          
          <div class="mb-3">
            <label class="form-label">Hora</label>  
            <input type="time" class="form-control" name="hora" value="{{ $historia->hora }}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="3">{{ $historia->descripcion }}</textarea>
          </div>  

          <div class="mb-3">
            <label class="form-label">Diagnóstico</label>
            <input type="text" class="form-control" name="diagnostico" value="{{ $historia->diagnostico }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Tratamiento</label>
            <input type="text" class="form-control" name="tratamiento" value="{{ $historia->tratamiento }}">
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Médico</label>
            <select class="form-select" name="usuario_id">
              @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $usuario->id == $historia->usuario_id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Paciente</label>
            <select class="form-select" name="paciente_id">  
              @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}" {{ $paciente->id == $historia->paciente_id ? 'selected' : '' }}>{{ $paciente->nombre }}</option>
              @endforeach
            </select>
          </div> 
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
  <a href="/historia" class="btn btn-secondary">Cancelar</a>
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
