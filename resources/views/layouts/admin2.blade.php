<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!--title>{{ config('app.name', 'Catalogo de Productos') }}</title-->
  <title>Laboratorio de Electricidad</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!--li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li-->
      </ul>

      <!-- SEARCH FORM -->
      <!--form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form-->

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Salir') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ asset('home') }}" class="brand-link" style="background-color: rgba(128,4,4,0.7)">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ELECTRILAB</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar" style="background-color: rgba(128,4,4,0.7)">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Edward Figueroa</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <!-- Sidebar user panel (optional) -->
            <!-- INICIO DEL MENU  -->
            <!-- Sidebar Menu -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  COTIZACIONES
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ asset('solicitante') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Solicitante</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ asset('contacto') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Contactos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ asset('cotizacion') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Cot.Ensayos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Cot.Calibraciones</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Cot.Capacitaciones</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ asset('contacto') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Busqueda</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  SERVICIOS EXTRAS
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('asesoria.index') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Asesorias</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('servicioac.index') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Servicio Academico</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  CAPACITACION
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- actualizado por marck, usando ELOQUENT -->
                  <a href="{{ route('curso.index') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Cursos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('instructor.index') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Instructores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('horario-curso.index') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Horario de Cursos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('horario-instructor.index') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Horario de Instructores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('instructor-curso.index') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Curso Instructor</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('descuento.index') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Descuento de Cursos</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  SISTEMA
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ asset('usuario') }}" class="nav-link">
                    <i class="far nav-icon"></i>
                    <p>Usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    @yield('content')

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 <a href="#">Laboratorio de Electricidad No6 - FIEE</a>.</strong>
      Todos los derechos reservados.
      <!--div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div-->
    </footer>

  </div>
  <!-- ./wrapper -->
  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/adminlte.js')}}"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
  <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
  <script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
  <!-- PAGE SCRIPTS -->
  <script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
</body>

</html>