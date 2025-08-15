@extends('layouts.cliente')

@section('title', 'Laboratorio N°6 de Electricidad FIEE-UNI')

@section('content')
        <style>
            .btn-dec{
                margin-left: 300px;
                margin-top: 50px;
                margin-bottom: 80px;
                padding-top: 15px;
                color: white !important;
                width: 90% !important;
                background-color: rgb(107, 0, 0);
                height: 60px;
                border-radius: 10px;
                font-size: 20px;
            }
            .btn-dec:hover{
                color: rgb(107, 0, 0)!important;
                background-color: #F1FFCC !important;
                border-style: solid;
                border-width: 2px  !important;
                border-color: rgb(107, 0, 0);
                border-radius: 10px;
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
        <!-- end header -->
        <!-- start hero section -->
        <!-- end hero section -->
        <!-- start feature box section -->
        <!-- end feature box section -->
        <!-- start parallax section -->
        <!-- end parallax section -->
        <!-- start services section -->
        <!-- end services section -->
        <!-- start counter section -->

        <!-- end counter section -->
        <!-- start accordion section -->

        <section class="bg-light-gray border-none p-0 wow fadeIn" style="background-color: rgb(241, 255, 204);" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6 padding-seven-lr padding-six-half-tb lg-padding-five-tb lg-padding-six-lr md-padding-six-all sm-padding-50px-tb sm-padding-15px-lr wow fadeInLeft">
                        <h5 class="alt-font text-extra-dark-gray text-center text-lg-left margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom font-weight-600">
                        <span class="font-weight-300 d-block sm-margin-15px-bottom" style="color:#610000;font-weight:bold;" >Capacitaciones Tecnicas
                        </span>
                        </h5>
                        <!-- start accordion -->
                        <div class="panel-group accordion-style2" id="accordion-main">
                            <!-- start tab content -->
                            <div class="panel panel-default" >
                                <div class="panel-heading" style="padding-right: 0; padding-left: 0; background-color: rgb(241, 255, 204);" >
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main" href="#collapseOne">
                                        <div class="panel-title">
                                            <span class="alt-font font-weight-600 text-deep-pink tab-tag" style="font-size:0.8rem;" >01</span>
                                            <span class="text-extra-dark-gray sm-width-80 d-inline-block" style="font-size:0.9rem; font-weight:bold;">Empalmador de BT y MT</span>
                                            <i style="margin-left:3px" class="indicator fas fa-angle-down float-right text-extra-dark-gray"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse " data-parent="#accordion-main">

                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="panel panel-default" >
                                <div class="panel-heading" style="padding-right: 0; padding-left: 0; background-color: rgb(241, 255, 204);" >
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main" href="#collapseTwo">
                                        <div class="panel-title">
                                            <span class="alt-font font-weight-600 text-deep-pink tab-tag" style="font-size:0.8rem;" >02</span>
                                            <span class="text-extra-dark-gray sm-width-80 d-inline-block" style="font-size:0.9rem; font-weight:bold;">Sistema de Puesta a Tierra</span>
                                            <i style="margin-left:3px" class="indicator fas fa-angle-down float-right text-extra-dark-gray "></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" data-parent="#accordion-main">
                                    <div class="panel-body">
                                    <ul>
                                        <li>Ingeniero a cargo del Curso: Ing. Alberto Sandoval Rodríguez</li>
                                        <li><a href="https://pe.linkedin.com/in/ing-alberto-sandoval-rodr%C3%ADguez-3a295a15" target="_blank">Hoja de Vida del Docente</a></li>
                                        <li>Silabo a dictarse:</li>
                                            <ol>
                                                <li>Generalidades y conexiones de puesta a tierra</li>
                                                <li>Resistividad del terreno</li>
                                                <li>Medición de resistividad</li>
                                                <li>Diseño de Puesta a Tierra</li>
                                                <li>Componentes de una Puesta a Tierra</li>
                                                <li>Cálculo de la resistencia de Puesta a tierra</li>
                                                <li>Técnicas para su elaboración</li>
                                                <li>Medición y mejoramiento de Sistemas de Puesta a Tierra</li>
                                            </ol>
                                        <li>Público Objetivo: Estudiantes y trabajadores del rubro eléctrico, técnicos e ingenieros</li>
                                        <li>Material Académico: Diapositivas en digital</li>
                                        <li>Certificación: A nombre del Laboratorio N°6 de Electricidad FIEE UNI, firmado por el jefe del Laboratorio y el Docente a cargo del curso</li>
                                        <li>Horario: sábado 22/02 y Domingo 23/02</li>
                                        <li>Duracion: 8HRS (Teoría, Práctica y Examen)</li>
                                        <li>Lugar: Laboratorio de Electricidad FIEE UNI</li>
                                        <li>Inversión: S/. 300</li>
                                        <li><a href="{{ asset('images/images/quinto/CHÁVEZ_ORLANDO.pdf') }}">CCV del Docente</a></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="panel panel-default" >
                                <div class="panel-heading" style="padding-right: 0; padding-left: 0; background-color: rgb(241, 255, 204);" >
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main" href="#collapseThree">
                                        <div class="panel-title">
                                            <span class="alt-font font-weight-600 text-deep-pink tab-tag" style="font-size:0.8rem;" >03</span>
                                            <span class="text-extra-dark-gray sm-width-80 d-inline-block" style="font-size:0.9rem; font-weight:bold;">Sistema de Gestión de la Salud y Seguridad en el Trabajo Ley N° 29783</span>
                                            <i style="margin-left:3px" class="indicator fas fa-angle-down float-right text-extra-dark-gray "></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" data-parent="#accordion-main">
                                    <div class="panel-body">
                                    <ul>
                                        <li>Ingeniero a cargo del Curso: Ing. Orlando Chávez Chacaltana</li>
                                        <li><a href="https://pe.linkedin.com/in/ing-alberto-sandoval-rodr%C3%ADguez-3a295a15" target="_blank">Hoja de Vida del Docente</a></li>
                                        <li>Silabo a dictarse:</li>
                                            <ol>
                                                <li>Estructura cognoscitiva de la seguridad y salud ocupacional</li>
                                                <li>Las condiciones de trabajo. Disposiciones legales, convencionales y de responsabilidad social</li>
                                                <li>Análisis y medición de riesgos laborales</li>
                                                <li>Modelo de reglamento interno de seguridad y salud en el trabajo</li>
                                            </ol>
                                        <li>Público Objetivo: Estudiantes y trabajadores del rubro eléctrico, técnicos e ingenieros</li>
                                        <li>Material Académico: Diapositivas en digital</li>
                                        <li>Certificación: A nombre del Laboratorio N°6 de Electricidad FIEE UNI, firmado por el jefe del Laboratorio y el Docente a cargo del curso</li>
                                        <li>Horario: sábado 29/02 y Domingo 01/03</li>
                                        <li>Duracion: 8HRS (Teoría, Práctica y Examen)</li>
                                        <li>Lugar: Laboratorio de Electricidad FIEE UNI</li>
                                        <li>Inversión: S/. 300</li>
                                        <li><a href="{{ asset('images/images/quinto/CHÁVEZ_ORLANDO.pdf') }}" >CCV del Docente</a></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="panel panel-default" >
                                <div class="panel-heading" style="padding-right: 0; padding-left: 0; background-color: rgb(241, 255, 204);" >
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main" href="#collapseFour">
                                        <div class="panel-title">
                                            <span class="alt-font font-weight-600 text-deep-pink tab-tag" style="font-size:0.8rem;" >04</span>
                                            <span class="text-extra-dark-gray sm-width-80 d-inline-block" style="font-size:0.9rem; font-weight:bold;">Software de Iluminacion DIALUX</span>
                                            <i style="margin-left:3px" class="indicator fas fa-angle-down float-right text-extra-dark-gray "></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" data-parent="#accordion-main">
                                </div>
                            </div>
                            <p style="color: black;text-align: justify;margin-top: 50px;border: 1px solid #800404;border-radius: 5px; padding: 10px 10px 10px 10px;">
                                * of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets contai
                            </p>



                        </div>
                        <!-- end accordion -->
                    </div>
                    <div class="col-12 col-lg-6 cover-background md-height-500px sm-height-350px wow fadeInRight">
                    <img src="{{ asset('images/images/quinto/imagen1.jpg') }}" alt="">
                    </div>

                    <section class="wow fadeIn bg-light-gray padding-35px-tb top-space" style="background-color: #800404;width:100%;padding-top: 15px;padding-bottom: 5px;">
                        <div class="container-fluid">
                        <h3 class="text-uppercase" style="color:white;text-align:center;margin-bottom:10px;">
                        Nuestros principales Asesores
                        </h3>
                        </div>
                    </section>


            <!-- aqui poner datos de los asesores -->

            <!-- inicio -->
            <div class="container" style="margin-top:40px;margin-bottom:40px;width:100%;margin-left:320px;">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-3 col-md-6 text-center wow fadeIn" data-wow-delay="0.2s">
                        <img src="http://placehold.it/600x909" alt="" class="w-100">
                    </div>
                    <div class="col-12 col-xl-6 p-0 lg-margin-five-top text-center text-lg-left sm-no-margin-top wow fadeIn" data-wow-delay="0.4s">
                        <div class="padding-twelve-lr lg-padding-15px-lr sm-padding-five-lr sm-padding-ten-top w-100">
                            <h4 class="font-weight-600 alt-font text-extra-dark-gray letter-spacing-minus-1">Edward Figueroa Maldonado</h4>
                            <p class="text-extra-large alt-font font-weight-400" style="text-align: justify;"> Descripcion del ccv -->We always stay with our clients and respect their business. We deliver 100% and provide instant response.</p>
                            <center>
                            <a href="about-us-modern.html" class="btn btn-small btn-dark-gray">Descargar CCV</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin -->

            <!-- inicio -->
            <div class="container" style="margin-top:40px;margin-bottom:40px;width:100%;margin-left:320px;">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-3 col-md-6 text-center wow fadeIn" data-wow-delay="0.2s">
                        <img src="http://placehold.it/600x909" alt="" class="w-100">
                    </div>
                    <div class="col-12 col-xl-6 p-0 lg-margin-five-top text-center text-lg-left sm-no-margin-top wow fadeIn" data-wow-delay="0.4s">
                        <div class="padding-twelve-lr lg-padding-15px-lr sm-padding-five-lr sm-padding-ten-top w-100">
                            <h4 class="font-weight-600 alt-font text-extra-dark-gray letter-spacing-minus-1">Edward Figueroa Maldonado</h4>
                            <p class="text-extra-large alt-font font-weight-400" style="text-align: justify;"> Descripcion del ccv -->We always stay with our clients and respect their business. We deliver 100% and provide instant response.</p>
                            <center>
                            <a href="about-us-modern.html" class="btn btn-small btn-dark-gray">Descargar CCV</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin -->

                </div>
            </div>

                    <div class="row">

                            <div class="">
                                <a href="#" type="button" class="btn btn-dec" target="blank">
                                    Boton para Cotizaciones de Capacitaciones
                                </a>
                            </div>

                        </div>


        </section>
        <!-- start blog section -->
        <!-- end blog section -->
        <!-- start clients slider section  -->
        <!-- end clients slider section -->
        <!-- start review section -->
        <!-- end review section -->
        <!-- start contact section -->
        <!-- end contact section -->
        <!-- start features section -->
        <!-- end features section -->
        <!-- start footer -->
        <!-- end footer -->
        <!-- start scroll to top -->

@endsection