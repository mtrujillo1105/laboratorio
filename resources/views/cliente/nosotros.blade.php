@extends('layouts.cliente')

@section('title', 'Laboratorio N°6 de Electricidad FIEE-UNI')

@section('content')
        <style>
            .btn-dec{
                border:1px solid white !important;
                color: white !important;
                width: 75% !important;
            }
            .btn-dec:hover{
                color: rgb(107, 0, 0)!important;
                background-color: white !important;
                font-weight: bold;
            }
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
        <section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small top-space" style="background-color: rgb(241, 255, 204);" >
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-md-6 text-center text-md-left">
                        <!-- start page title -->
                        <h1 class="alt-font text-extra-dark-gray font-weight-600 mb-0 text-uppercase" >Acerca de Nosotros: Laboratorio N°6 de Electricidad FIEE-UNI </h1>
                        <!-- end page title -->
                    </div>
                    <div class="col-xl-4 col-md-6 alt-font breadcrumb justify-content-center justify-content-md-end text-small sm-margin-10px-top">
                        <!-- start breadcrumb -->
                        <!-- end breadcrumb -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        <!-- start section -->
        <section class="wow fadeIn" style="padding:  1rem;background-color: rgb(241, 255, 204);" >
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 text-center text-lg-left md-margin-30px-bottom md-padding-80px-lr sm-padding-15px-lr wow fadeIn">
                        <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase width-80 lg-width-100">Nuestra Mision</h5>
                        <div class="separator-line-verticle-extra-small bg-extra-dark-gray width-50 md-width-70 mx-auto ml-lg-0 margin-30px-bottom md-margin-20px-bottom"></div>
                        <p class="width-95 lg-width-100" style="text-align: justify;font-size: 0.8rem;">
                        Contribuir con la Facultad de Ingeniería Eléctrica y Electrónica en la formación técnica en las áreas tecnológicas, transformando el conocimiento científico en aplicaciones prácticas de diseño, simulación,  innovación y optimización de procesos de control en los sistemas eléctricos empleando tecnología moderna.
                        </p>

                        <p class="width-95 lg-width-100" style="text-align: justify;font-size: 0.8rem;">
                        Apoyar en la formación académica y de investigación a los estudiantes en el área de electricidad en aquellas materias que requieran de estos conocimientos para su desarrollo profesional, teniendo como premisa fundamental la observancia de los principios institucionales y contando dentro de su personal con profesionales comprometidos con la labor académica y creadora de la docencia.
                        </p>

                        <p class="width-95 lg-width-100" style="text-align: justify;font-size: 0.8rem;">
                        Atender a la industria con eficiencia, honestidad y transparencia en cada una de las diversas pruebas que se realizan tanto en el laboratorio como en el campo, en beneficio de los clientes de las diversas industrias eléctricas a fin de satisfacer los requerimientos de ensayo a los diversos materiales y equipos eléctricos que son utilizados en la industria.
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6 sm-margin-15px-bottom" data-wow-delay="0.2s">
                        <img src="{{ asset('images/images/primero/imagen1.jpg') }}" alt="" style="margin-top: 40%;width: 100%;" />
                    </div>
                    <div class="col-12 col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.4s">
                        <img src="{{ asset('images/images/primero/imagen2.jpg') }}" alt="" style="width: 100%;margin-top: 50%;" />
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start feature box section -->
        <section class="p-0 wow fadeIn bg-light-gray" style="background-color: rgb(241, 255, 204);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6 cover-background md-height-500px sm-height-350px wow fadeInLeft" style="background-image:url({{ asset('images/images/primero/imagen3.jpg') }});margin: 3rem 0;"><div class="h-sm-400px"></div></div>
                    <div class="col-12 col-lg-6 padding-six-half-lr lg-padding-eight-lr md-padding-30px-lr padding-five-tb md-padding-nine-half-tb sm-padding-15px-lr sm-padding-50px-tb wow fadeInRight">
                        <h5 class="alt-font text-extra-dark-gray margin-seven-half-bottom lg-margin-ten-half-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center text-lg-left md-width-70 mx-auto mx-lg-0 sm-width-100 text-uppercase font-weight-700">Nuestra Vision</h5>
                        <div class="row text-center text-md-left">
                            <!-- start feature box item-->
                            <div class="col-12 col-xl-6 col-lg-12 col-md-6 margin-six-bottom lg-no-padding-right lg-margin-30px-bottom sm-margin-30px-bottom sm-padding-15px-right last-paragraph-no-margin">
                                <p class="width-90 sm-width-100" style="text-align: justify;font-size: 0.8rem;">
                                Ser un Laboratorio de Electricidad con liderazgo y eficiencia de funcionamiento, formando estudiantes con alta competitividad y ofreciendo servicio técnico - científico para el buen desarrollo tecnológico, económico y social del país. Asimismo, consolidarnos como foco motivador y generador de conocimiento de la electricidad, tanto a nivel teórico como práctico de esta ciencia.
                                </p>
                            </div>
                            <!-- end feature box item-->
                            <!-- start feature box item-->
                            <div class="col-12 col-xl-6 col-lg-12 col-md-6 margin-six-bottom lg-no-padding-right lg-margin-30px-bottom sm-margin-30px-bottom sm-padding-15px-right last-paragraph-no-margin">
                                <p class="width-90 sm-width-100" style="text-align: justify;font-size: 0.8rem;">
                                Establecer como guías en la realización de los diversos ensayos para la industria nacional con la capacidad tecnológica y potencial humano que realice las mediciones y calibraciones de todos los equipos solicitados por las diferentes empresas usando adecuados equipos patrones que conllevan a la realización de los diversos trabajos en forma técnica-científica y que emitan resultados precisos.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="extra-big-section parallax wow fadeIn" data-stellar-background-ratio="0.5" style="background-color: #6B0000;">
            <div class="opacity-full-dark "></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-7 col-md-11 text-center">
                        <div class="alt-font text-medium-gray text-uppercase text-small margin-20px-bottom" style="font-size: 40px;">Nuestra Historia</div>
                        <br>
                        <br>
                        <p class="text-light-gray margin-40px-bottom sm-margin-30px-bottom text-uppercase" style="font-size: 20px;text-align: justify;">
                        El Laboratorio N°6 de Electricidad fue fundado el 8 de septiembre de 1962. Durante muchos años formó parte de la Facultad de Ingeniería Mecánica, la cual se encargaba de impartir cátedra en la carrera de Ingeniería Mecánica-Eléctrica. Sin embargo, en 1984, tras el vertiginoso desarrollo tecnológico del sector eléctrico en el mundo, la Universidad Nacional de Ingeniería decidió fundar la Facultad de Ingeniería Eléctrica y Electrónica con el objetivo de proveer profesionales capacitados que puedan hacer frente a los nuevos retos energéticos que se comenzaban a presentar en nuestro país. Es así como el Laboratorio N°6 de Electricidad pasó a formar parte de la FIEE y desde entonces ha realizado diversas mejoras tales como la adquisición de un completo kit de aerogeneradores, la implementación de la Sala de Luminarias y el Laboratorio de Eficiencia Energética, entre otros.
                        </p>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" type="button" class="btn btn-dec btn-block" target="blank">Descargar Brochure del Laboratorio</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

@endsection