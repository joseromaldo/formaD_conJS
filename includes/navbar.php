<nav class="navbar fixed-top navbar-expand-lg bg-primary shadow-sm p-3 mb-5 rounded">
  <div class="container-fluid">
    <a class="navbar-brand me-2 d-flex align-items-center text-white" href="../home/home.php">
      <img src="/forma_D/src/images/logo.jpeg" alt="Logo" width="30" height="30" class="me-2 rounded"> 
      <span>Application Control</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="../home/home.php"><i class="bi bi-house-fill me-2"></i>Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Grado
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/forma_D/vistas/grados/index.php">Crear Grado</a></li>
            <li><a class="dropdown-item" href="/forma_D/vistas/grados/buscar.php">Buscar Grado</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Arma
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/forma_D/vistas/armas/index.php">Crear Arma</a></li>
            <li><a class="dropdown-item" href="/forma_D/vistas/armas/buscar.php">Buscar Arma</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Programadores
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/forma_D/vistas/programador/index.php">Registrar programadores</a></li>
            <li><a class="dropdown-item" href="/forma_D/vistas/programador/buscar.php">Buscar programadores</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Aplicaciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/forma_D/vistas/aplicaciones/index.php">Crear aplicaciones</a></li>
            <li><a class="dropdown-item" href="/forma_D/vistas/aplicaciones/buscar.php">Buscar aplicaciones</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tareas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/forma_D/vistas/tareas/index.php">Crear Tareas</a></li>
            <li><a class="dropdown-item" href="/forma_D/vistas/tareas/buscar.php">Buscar Tareas</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Asignar
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/forma_D/vistas/asignar/index.php">Asignar aplicaciones</a></li>
            <li><a class="dropdown-item" href="/forma_D/vistas/asignar/buscar.php">Buscar asignaciones</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Detalle
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/forma_D/vistas/detalle/index.php">Registro de detalles</a></li>
            <li><a class="dropdown-item" href="/forma_D/vistas/detalle/buscar.php">Buscar detalles</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
