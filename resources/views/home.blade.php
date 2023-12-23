<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Menu principal</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    
    .page-bg {  
      position: absolute;
      width: 100%;
      height: 100%;
      background: url('https://www.saluti.com.co/media/mgs_blog/Esenciales_medicos_1.jpg') no-repeat center center fixed; 
      -webkit-filter: blur(5px);
      filter: blur(5px);
    }

    .menu {
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,.1); 
      position: fixed;
      top: 0; 
      width: 100%;
      z-index: 999; 
    }

    .dropdown-item {
      display: flex;
      align-items: center;
    }

    .dropdown-item i {
      margin-right: .5rem;
      font-size: 1.2rem;
    }

  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light menu py-3">
    <div class="container">
    
      <a class="navbar-brand" href="#">
        <h2>Consultorio Médico</h2>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ms-auto">
        
          <li class="nav-item">
            <a class="nav-link" href="/">Inicio</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Secciones
            </a>           

            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="/usuarios">
                  <i class="bi bi-people"></i> 
                  Usuarios
                </a>
              </li>

              <li>
                <a class="dropdown-item" href="/rolusuarios">
                  <i class="bi bi-key"></i>
                  Roles de Usuarios
                </a>
              </li>

              <li>
                <a class="dropdown-item" href="/pacientes">
                  <i class="bi bi-person"></i>
                  Pacientes
                </a>
              </li>

              <li>
                <a class="dropdown-item" href="/citas">
                  <i class="bi bi-calendar"></i>
                  Citas
                </a>
              </li>
              
              <li>
                <a class="dropdown-item" href="/historia">
                  <i class="bi bi-file-earmark-medical"></i>  
                  Historias Clínicas
                </a>
              </li>  

              <li>
                <a class="dropdown-item" href="/recetario">
                  <i class="bi bi-journal-medical"></i>
                  Recetario
                </a>
              </li>

            </ul>

          </li>
        
        </ul>

      </div>

    </div>
  </nav>

  <div class="page-bg"></div>

  <div class="container my-5">
    <h2>Bienvenido al Consultorio</h2>
    <p>Contenido de página...</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
