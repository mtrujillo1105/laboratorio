<!doctype html>
<html class="no-js" lang="en">
    <head>
        <style>
            .men{
                background-color: #800404;
                text-align: center;
            }
            #header {
                width:fit-content;
                font-family:Arial, Helvetica, sans-serif;
                padding-left: 15rem;
            }

            ul, ol {
                list-style:none;
            }

            .nav > li {
                float:left;
                padding:1rem 0.5rem;;
            }

            .nav li a {
                background-color:#800404;
                color:#fff;
                text-decoration:none;
                padding:10px 12px;
                display:block;
                font-weight: bold;
                text-align: left;
            }
            .nav li a:hover,.nav li:hover {
                background-color:#8e0606;
            }

            .nav li ul {
                display:none;
                position:absolute;
                min-width:140px;
                z-index: 9999;

            }

            .nav li:hover > ul {
                display:block;
                padding-top: 1rem;
            }

            .nav li ul li {
                position:relative;
            }

            .nav li ul li ul {
                right:-140px;
                top:0px;
            }
        </style>
        <!-- title -->
        <title>Laboratorio N°6 de Electricidad FIEE-UNI</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
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
        <!-- animation -->
        <link rel="stylesheet" href="{{ asset('css/css-web/animate.css') }}" />
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/css-web/bootstrap.min.css') }}" />
        <!-- et line icon -->
        <link rel="stylesheet" href="{{ asset('css/css-web/et-line-icons.css') }}" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="{{ asset('css/css-web/font-awesome.min.css') }}" />
        <!-- themify icon -->
        <link rel="stylesheet" href="{{ asset('css/css-web/themify-icons.css') }}">
        <!-- swiper carousel -->
        <link rel="stylesheet" href="{{ asset('css/css-web/swiper.min.css') }}">
        <!-- justified gallery  -->
        <link rel="stylesheet" href="{{ asset('css/css-web/justified-gallery.min.css') }}">
        <!-- magnific popup -->
        <link rel="stylesheet" href="{{ asset('css/css-web/magnific-popup.css') }}" />
        <!-- revolution slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/css/settings.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/css/layers.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/css/navigation.css') }}">
        <!-- bootsnav -->
        <link rel="stylesheet" href="{{ asset('css/css-web/bootsnav.css') }}">
        <!-- style -->
        <link rel="stylesheet" href="{{ asset('css/css-web/style.css') }}" />
        <!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('css/css-web/responsive.css') }}" />
        <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body class="width-100 overflow-hidden" >

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
                            <li><a href="{{ route('asesorias') }}">ASESORIA DE SERVICIOS IN-HOUSE</a></li>
                            <li><a href="{{ route('academico') }}">SERVICIO ACADEMICO</a></li>
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
                    <li><a href="#">COTIZACIONES</a>
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


        <section style="padding:0">
        <div class="bg-black position-absolute left-0  width-100 height-100" style="background-color: #d8980c47">

            <!-- start slider section -->
            <section class="p-0">
                <div class="swiper-bottom-scrollbar-full swiper-container">
                    <div class="swiper-wrapper">
                        <!-- start slider item -->
                        <div class="swiper-slide width-550px sm-width-100 sm-height-auto">
                            <div class="position-relative width-90 height-100 d-flex align-items-center padding-ten-all sm-padding-fifteen-all sm-width-100">
                                <div>
                                    <h4 class="text-medium-gray d-block margin-5px-bottom alt-font" style="color:#610000;font-weight: bold;">Equipos del Laboratorio</h4>

                                    <p class="text-large d-block float-left font-weight-300 width-90 margin-35px-bottom" style="color: #610000;">
                                    A continuacion se muestran los equipos con los que cuenta el Laboratorio N°6
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end slider item -->
                        <!-- start slider item -->
                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">

                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">MICROHMIMETRO DIGITAL</h3>
                                    <img src="{{ asset('images/images/tercero/1.jpg') }}"  alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-center" style="color:black; background-color:  #ffffff61;">

                                    </p>
                                </div>

                            </div>
                        </div>
                        <!-- end slider item -->
                        <!-- start slider item -->
                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">FUENTE DE CORRIENTE ALTERNA</h3>
                                    <img src="{{ asset('images/images/tercero/2.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end slider item -->
                        <!-- start slider item -->
                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">ESPINTEROMETRO</h3>
                                    <img src="{{ asset('images/images/tercero/3.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end slider item -->
                        <!-- start slider item -->
                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">
                                    PATRÓN PORTÁTIL TRIFÁSICO ZERA MT3000</h3>
                                    <img src="{{ asset('images/images/tercero/4.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end slider item -->
                        <!-- start slider item -->
                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">
                                    ANALIZADOR DE CALIDAD DE ENERGÍA</h3>
                                    <img src="{{ asset('images/images/tercero/5.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end slider item -->
                        <!-- start slider item -->
                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">MEDIDOR DE AISLAMIENTO</h3>
                                    <img src="{{ asset('images/images/tercero/6.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">MEDIDOR DE LA RELACIÓN DE TRANSFORMACIÓN</h3>
                                    <img src="{{ asset('images/images/tercero/7.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">OHMETRO DIGITAL DE BAJA RESISTENCIA</h3>
                                    <img src="{{ asset('images/images/tercero/8.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000"> MEGOHMETROS</h3>
                                    <img src="{{ asset('images/images/tercero/9.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">VERNIER</h3>
                                    <img src="{{ asset('images/images/tercero/10.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">MEDIDOR DE NIVEL SONORO</h3>
                                    <img src="{{ asset('images/images/tercero/11.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
                            <div class="height-100 d-flex align-items-center">
                                <div class="d-block position-relative">
                                    <h3 style="text-align: center;font-size: 1.2rem;color: white; background-color:#610000">VOLTÍMETRO DIGITAL DVM-80 HD ELECTRIC</h3>
                                    <img src="{{ asset('images/images/tercero/12.jpg') }}" alt=""/>
                                    <p class="bottom-text width-100 text-extra-small text-uppercase text-center" style="color:black;">

                                    </p>
                                </div>
                            </div>
                        </div>



                        <!-- end slider item -->
                        <div class="swiper-slide width-150px sm-width-100 sm-height-auto">
                        </div>
                    </div>
                    <!-- start slider swiper pagination -->
                    <div class="swiper-scrollbar d-none d-md-inline-block"></div>
                    <div class="swiper-pagination-vertical position-fixed bullet-deep-pink z-index-5"></div>
                    <!-- end slider swiper pagination -->
                </div>
            </section>
            <!-- end slider section -->
        </div>
        </section>
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
    </body>
</html>