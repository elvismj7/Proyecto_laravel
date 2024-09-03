
@section('title', 'Login')

<nav class="navbar navbar-expand-lg navbar-ligth bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">MENU</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
              <a class="nav-link active text-white" href="inicio">Inicio</a>
          </li>
          <li class="nav-item">
                  <a class="nav-link text-white" href="#">Usuarios</a>
          </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="productos ">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="ventas ">Ventas</a>
            </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="cliente">Clientes</a>
          </li>
      </ul>
      <form class="d-flex" role="search">
        <button class="btn btn-outline-success" type="submit"><a class="nav-link text-white " href="{{ url('/') }}">Cerrar sesión</a></button>
      </form>
    </div>
  </div>
</nav>
@yield('encabezado')
@vite('resources/js/app.js')
