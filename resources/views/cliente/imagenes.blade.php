@extends('layouts.cliente')

@section('title', 'Laboratorio N°6 de Electricidad FIEE-UNI')

@section('content')
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
                padding:1rem 0.5rem;
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

        <!-- start page title section -->
        <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-color:  rgb(107, 0, 0);" >
            <div class="opacity-medium "></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 d-flex flex-column justify-content-center text-center extra-small-screen page-title-large">
                        <!-- start page title -->
                        <h1 class="text-white-2 alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom" style="font-size: 70px;">
                        Laboratorio N°6 de Electricidad <br> <br> <br> <div style="font-size: 90px;"> FIEE-UNI </div>
                        </h1>
                        <!-- end page title -->
                        <!-- start sub title -->

                        <!-- end sub title -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        <!-- start portfolio section -->
        <section class="wow fadeIn padding-90px-top md-padding-50px-top sm-padding-30px-top" style="background-color: rgb(241, 255, 204);" >
            <div class="container">
            </div>
            <!-- start filter content -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 px-3 p-md-0">
                        <div class="filter-content overflow-hidden">
                            <ul class="portfolio-grid work-3col hover-option4 gutter-medium">
                                <li class="grid-sizer"></li>
                                <!-- start portfolio-item item -->
                                <li class="grid-item web branding design wow fadeInUp">

                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset('images/images/septimo/imagen1.jpg') }}" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            EQUIPOS DE PROTECCION PERSONAL
                                                            </span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small mb-0">
                                                            Indispensable para todo trabajo
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item web branding design wow fadeInUp" data-wow-delay="0.2s">

                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset('images/images/septimo/imagen2.jpg') }}" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            PANELES INFORMATIVO
                                                            </span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small mb-0">
                                                            Información necesaria para conocernos
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item advertising branding photography wow fadeInUp" data-wow-delay="0.4s">

                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset('images/images/septimo/imagen3.jpg') }}" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            MAQUINA GENERALIZADA DE 48 POLOS
                                                            </span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small mb-0">
                                                            Usada en experiencias académicas
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item web advertising design wow fadeInUp">

                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset('images/images/septimo/imagen4.jpg') }}" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            MESAS DE TRABAJO
                                                            </span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small mb-0">
                                                            Para trabajar de manera asegura
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item web branding design wow fadeInUp" data-wow-delay="0.2s">

                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset('images/images/septimo/imagen5.jpg') }}" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            SUBESTACION DEL LABORATORIO DE ELECTRICIDAD
                                                            </span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small mb-0">
                                                            Energizan las mesas de trabajo
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item web advertising branding design photography wow fadeInUp" data-wow-delay="0.4s">

                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset('images/images/septimo/imagen6.jpg') }}" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            MOTOR DE INDUCCIÓN
                                                            </span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small mb-0">
                                                            Circuito demostrativo para fines académicos
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->

                                <!-- start portfolio item -->
                                <li class="grid-item web advertising branding design photography wow fadeInUp" data-wow-delay="0.2s">

                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset('images/images/septimo/imagen8.jpg') }}" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            MAQUINA BROWN BOVERY
                                                            </span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small mb-0">
                                                            Salida de tensión y frecuencia variable
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item web advertising branding design wow fadeInUp" data-wow-delay="0.4s">

                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset('images/images/septimo/imagen7.jpg') }}" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            EQUIPOS DEL LABORATORIO
                                                            </span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small mb-0">
                                                            Han recibido mantenimiento preventivo
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                </li>
                                <li class="grid-item web advertising design photography wow fadeInUp">

                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset('images/images/septimo/imagen9.jpg') }}" alt="">
                                            </div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light3 margin-25px-bottom"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            AULA DE ESTUDIO
                                                            </span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small mb-0">
                                                            Donde se evalúa el aprendizaje obtenido
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->

                                <!-- end portfolio item -->
                                <!-- start portfolio item -->

                                <!-- end portfolio item -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end filter content -->
        </section>
        <!-- end portfolio section -->
        <!-- start call to action section -->
        <!-- end call to action section -->
@endsection