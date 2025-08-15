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

    <!--  Datatables estilos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('css/css/styles.scss') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    @auth

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

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
                        <span>
                            <strong><a href="#" class="d-block">{{ Auth::user()->name }}</a></strong>
                        </span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
                                
                                @can('solicitante.list')
                                <li class="nav-item">
                                    <a href="{{ asset('solicitante') }}" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Solicitantes</p>
                                    </a>
                                </li>
                                @endcan
                                
                                @can('contacto.list')
                                <li class="nav-item">
                                    <a href="{{ asset('contacto') }}" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Contactos</p>
                                    </a>
                                </li>
                                @endcan
                                
                                <li class="nav-item">
                                    <a href="{{ asset('cotizacion') }}" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Cot.Ensayos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ asset('calibracion') }}" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Cot.Calibraciones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ asset('capacitacion') }}" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Cot.Capacitaciones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('busqueda.index') }}" class="nav-link" target="_blank">
                                        <i class="far nav-icon"></i>
                                        <p>Busqueda Historica</p>
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
                                        <p>Horario Apertura de Cursos</p>
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
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('parametros.index') }}" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Configuración</p>
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


        <div class="content-wrapper" id="app">
            @yield('content')
        </div>
    </div>
    <!-- ./wrapper -->

    @endauth

    @guest
    <div class="container">
        <a href="/login" class="btn btn-danger btn-lg btn-block m-3" role="button" aria-pressed="true">
        Sesion expirada, click acá para autenticarse
        </a>
    </div>
    @endguest

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
    <!-- Datatables JS-->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    <!-- bortones datatable-->
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
    @yield('scripts')
</body>

</html>
