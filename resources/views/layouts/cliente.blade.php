<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Laboratorio N°6 de Electricidad FIEE-UNI')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">
    <meta name="author" content="ThemeZaa">
    <!-- description -->
    <meta name="description" content="POFO is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose agency and portfolio HTML5 template with 25 ready home page demos.">
    <!-- keywords -->
    <meta name="keywords" content="creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, agency, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, personal, masonry, grid, coming soon, faq">
    <!-- favicon -->
    <link rel="shortcut icon" href="">
    <link rel="apple-touch-icon" href="{{ asset('images/images/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/images/apple-touch-icon-114x114.png') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- animation -->
    <link rel="stylesheet" href="{{ asset('css/css-web/animate.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/css-web/bootstrap.min.css') }}">
    <!-- et line icon -->
    <link rel="stylesheet" href="{{ asset('css/css-web/et-line-icons.css') }}">
    <!-- font-awesome icon -->
    <link rel="stylesheet" href="{{ asset('css/css-web/font-awesome.min.css') }}">
    <!-- themify icon -->
    <link rel="stylesheet" href="{{ asset('css/css-web/themify-icons.css') }}">
    <!-- swiper carousel -->
    <link rel="stylesheet" href="{{ asset('css/css-web/swiper.min.css') }}">
    <!-- justified gallery  -->
    <link rel="stylesheet" href="{{ asset('css/css-web/justified-gallery.min.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('css/css-web/magnific-popup.css') }}">
    <!-- revolution slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/css/settings.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/css/navigation.css') }}">
    <!-- bootsnav -->
    <link rel="stylesheet" href="{{ asset('css/css-web/bootsnav.css') }}">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css/css-web/style.css') }}">
    <!-- responsive css -->

    <link rel="stylesheet" href="{{ asset('css/css-web/responsive.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
</head>

<body>
    <header>
        <!-- start navigation -->
        <!-- end navigation -->
    </header>

    <!-- NAV VAR -->
    <div class="row justify-content-center header" style="background-color: #d8980c47;">
        <div class="col-lg-3 col-md-4 col-12 d-none d-lg-flex align-items-center">
            <div class="row justify-content-center ">
                <div class="col-lg-12 col-12 col-md-12">
                    <img class="logo-menu " src="{{ asset('images/images/LogoLaboratorio.png') }}" alt="UNI" width="150%">
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-12 d-flex align-items-center ">
            <div class="row">
                <div class="col-12">
                    <h2 style="color: #610000;padding-bottom: 0px;background: none;text-align: center; font-size:2.7rem;margin:0;font-weight: bold;">
                        UNIVERSIDAD NACIONAL DE INGENIERIA
                    </h2>
                </div>
                <div class="col-12">
                    <h5 style="color: #9e4608;padding-bottom: 0px;background:none;text-align: center;font-size:1.8rem;margin: 0">
                        FACULTAD DE INGENIERIA ELÉCTRICA Y ELECTRÓNICA
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-12 d-flex align-items-center justify-content-center">
            <div class="justify-content-center">
                <div class="col-11">
                    <img class="logo-menu " src="{{ asset('images/images/uni-logo-color.png') }}" alt="UNI" width="80%">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid men">
        <div id="header">
            <ul class="nav">
                <li><a href="#">NOSOTROS</a>
                    <ul>
                        <li><a href="{{ route('nosotros') }}">MISIÓN Y VISIÓN</a></li>
                        <li><a href="{{ route('trabajadores') }}">TRABAJADORES</a></li>
                        <li><a href="{{ route('imagenes') }}">IMAGENES DEL LABORATORIO</a></li>
                        <li><a href="{{ route('equipos') }}">NUESTROS EQUIPOS</a></li>
                    </ul>
                </li>

                <li><a href="#">SERVICIOS</a>
                    <ul>
                        <li><a href="{{ route('servicios') }}">ENSAYOS, PRUEBAS Y CALIBRACIONES</a></li>
                        <li><a href="{{ route('capacitaciones') }}">CAPACITACIONES TÉCNICAS Y PROFESIONALES Y ASESORES</a></li>
                        <li>
                            <!--a href="{{ route('asesorias') }}">ASESORIA DE SERVICIOS IN-HOUSE</a-->
                            <a href="#">ASESORIA DE SERVICIOS IN-HOUSE</a>
                        </li>
                        <li>
                            <!--a href="{{ route('academico') }}">SERVICIO ACADEMICO</a-->
                            <a href="#">SERVICIO ACADEMICO</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">EVENTOS</a>
                    <ul>
                        <li><a href="{{ route('eventos') }}">FERIA TECNOLÓGICA FIEE </a></li>
                        <li><a href="{{ route('responsabilidad') }}">RESPONSABILIDAD SOCIAL</a></li>
                        <li><a href="{{ route('visitas') }}">VISITAS TÉCNICAS</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('clientes') }}">CLIENTES</a></li>
                <li><a href="{{ route('ubicacion') }}">UBICACION</a></li>
                <li><a href="javascript:void(0)">COTIZACIONES</a>
                    <ul>
                        <li><a href="{{ route('cot_ensayos') }}">ENSAYOS</a></li>
                        <li><a href="{{ route('cot_calibraciones') }}">CALIBRACIONES</a></li>
                        <li><a href="{{ route('cot_capacitaciones') }}">CAPACITACIONES</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('login') }}">INTRANET</a>
                    <!--
                        <ul>
                            <li><a href="">INTRANET PARA COTIZACIONES DE ENSAYOS</a></li>
                            <li><a href="">INTRANET PARA COTIZACIONES DE CALIBRACIONES</a></li>
                            <li><a href="">INTRANET PARA CAPACITACIONES</a></li>
                        </ul> -->
                </li>
            </ul>
        </div>
    </div>
    <!-- END NAVBAR -->

    @yield('content')

    <!-- START FOOTER -->
    <footer>
        <footer class="footer-standard-dark bg-extra-dark-gray">
            <div class="footer-widget-area padding-five-tb sm-padding-30px-tb">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 widget border-right border-color-medium-dark-gray md-no-border-right md-margin-30px-bottom sm-text-center">
                            <!-- start logo -->
                            <img class="" src="{{ asset('images/images/LogoLaboratorioBlanco.png') }}" width="100%" style="padding-top: 40%" alt="">
                            <!-- end logo -->
                            <!-- start social media -->
                            <!-- end social media -->
                        </div>
                        <!-- start additional links -->
                        <div class="col-lg-3 col-md-6 widget border-right border-color-medium-dark-gray padding-45px-left md-padding-15px-left md-no-border-right md-margin-30px-bottom text-center text-md-left">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600" style="text-align: center"></div>
                            <ul class="list-unstyled">
                                <li style="text-align: center;text-decoration: underline;">Ubicación de la UNI:</li>
                                <li style="text-align: center;font-weight: bold;font-size: 19px;color:#F5F5F5">Av. Túpac Amaru 210 – Rímac. Apartado 1301</li> <br>
                                <li style="text-align: center;text-decoration: underline;">Central telefónica de la UNI:</li>
                                <li style="text-align: center;font-weight: bold;font-size: 19px;color:#F5F5F5">200-9060</li> <br>
                                <li style="text-align: center;text-decoration: underline;">Ubicación en la UNI del Laboratorio de Electricidad:</li>
                                <li style="text-align: center;font-weight: bold;font-size: 19px;color:#F5F5F5">Alt. Puerta 3 UNI. Paradero ¨Estación UNI¨ del Metropolitano Pabellón A Primer Piso</li> <br>
                            </ul>
                        </div>
                        <!-- end additional links -->
                        <!-- start contact information -->
                        <div class="col-lg-3 col-md-6 widget border-right border-color-medium-dark-gray padding-45px-left md-padding-15px-left md-clear-both md-no-border-right sm-margin-30px-bottom text-center text-md-left">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600" style="text-align: center"></div>
                            <ul class="list-unstyled">
                                <li style="text-align: center;text-decoration: underline;">Teléfono Central del Laboratorio de Electricidad:</li>
                                <li style="text-align: center;font-weight: bold;font-size: 19px;color:#F5F5F5">481-3342</li> <br>
                                <li style="text-align: center;text-decoration: underline;">Horario de atención del Laboratorio de Electricidad:</li>
                                <li style="text-align: center;font-weight: bold;font-size: 19px;color:#F5F5F5">Lunes a Viernes de 8am a 4pm</li> <br>
                                <li style="text-align: center;text-decoration: underline;">Correo Electrónico para hacer cualquier consulta:</li>
                                <li style="text-align: center;font-weight: bold;font-size: 19px;color:#F5F5F5">labl1fiee@uni.edu.pe</li>
                            </ul>
                        </div>
                        <!-- end contact information -->
                        <!-- start instagram -->
                        <div class="col-lg-3 col-md-6 widget md-margin-30px-bottom sm-text-center">
                            <img class="" src="{{ asset('images/images/logouni-b.png') }}" width="70%" style="padding-top: 4rem;margin-left: 3.5rem" alt="">
                        </div>
                        <!-- end instagram -->
                    </div>
                </div>
            </div>
            <div class="bg-dark-footer padding-50px-tb text-center sm-padding-30px-tb">
                <div class="container">
                    <div class="row">
                        <!-- start copyright -->
                        <div class="col-md-8 text-md-left text-small text-center">
                            &copy;2020 FACULTAD DE INGENIERIA ELECTRICA Y ELECTRONICA UNI. TODOS LOS DERECHOS RESERVADOS.
                        </div>

                        <!-- end copyright -->
                    </div>
                </div>
            </div>
        </footer>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- start scroll to top -->
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
    <!-- end scroll to top  -->
    <!-- javascript libraries -->
    <script type="text/javascript" src="{{ asset('js/js-web/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js-web/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js-web/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js-web/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js-web/skrollr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js-web/smooth-scroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js-web/jquery.appear.js') }}"></script>
    <!-- menu navigation -->
    <script type="text/javascript" src="{{ asset('js/js-web/bootsnav.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js-web/jquery.nav.js') }}"></script>
    <!-- animation -->
    <script type="text/javascript" src="{{ asset('js/js-web/wow.min.js') }}"></script>
    <!-- page scroll -->
    <script type="text/javascript" src="{{ asset('js/js-web/page-scroll.js') }}"></script>
    <!-- swiper carousel -->
    <script type="text/javascript" src="{{ asset('js/js-web/swiper.min.js') }}"></script>
    <!-- counter -->
    <script type="text/javascript" src="{{ asset('js/js-web/jquery.count-to.js') }}"></script>
    <!-- parallax -->
    <script type="text/javascript" src="{{ asset('js/js-web/jquery.stellar.js') }}"></script>
    <!-- magnific popup -->
    <script type="text/javascript" src="{{ asset('js/js-web/jquery.magnific-popup.min.js') }}"></script>
    <!-- portfolio with shorting tab -->
    <script type="text/javascript" src="{{ asset('js/js-web/isotope.pkgd.min.js') }}"></script>
    <!-- images loaded -->
    <script type="text/javascript" src="{{ asset('js/js-web/imagesloaded.pkgd.min.js') }}"></script>
    <!-- pull menu -->
    <script type="text/javascript" src="{{ asset('js/js-web/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js-web/hamburger-menu.js') }}"></script>
    <!-- counter  -->
    <script type="text/javascript" src="{{ asset('js/js-web/counter.js') }}"></script>
    <!-- fit video  -->
    <script type="text/javascript" src="{{ asset('js/js-web/jquery.fitvids.js') }}"></script>
    <!-- skill bars  -->
    <script type="text/javascript" src="{{ asset('js/js-web/skill.bars.jquery.js') }}"></script>
    <!-- justified gallery  -->
    <script type="text/javascript" src="{{ asset('js/js-web/justified-gallery.min.js') }}"></script>
    <!--pie chart-->
    <script type="text/javascript" src="{{ asset('js/js-web/jquery.easypiechart.min.js') }}"></script>
    <!-- instagram -->
    <script type="text/javascript" src="{{ asset('js/js-web/instafeed.min.js') }}"></script>
    <!-- retina -->
    <script type="text/javascript" src="{{ asset('js/js-web/retina.min.js') }}"></script>
    <!-- revolution -->
    <script type="text/javascript" src="{{ asset('css/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('css/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- revolution slider extensions (load below extensions JS files only on local file systems to make the slider work! The following part can be removed on server for on demand loading) -->
    <!--<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>-->
    <!-- setting -->
    <script type="text/javascript" src="{{ asset('js/js-web/main.js') }}"></script>
    @yield('scripts')
</body>

</html>
