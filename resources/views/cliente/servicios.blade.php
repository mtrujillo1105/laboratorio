@extends('layouts.cliente')

@section('title', 'Laboratorio N°6 de Electricidad FIEE-UNI')

@section('content')
        <style>
        .icon-ser{
            width:  85px;
            border-radius:  100%;
            background-color: #AD005E;
        }
        .btn-dec{
                margin-left: 270px;
                margin-top: 110px;
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

        <section id="services" class="bg-light-gray wow fadeIn" style="background-color: #F1FFCC;" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center last-paragraph-no-margin">
                        <h5 class="font-weight-700 text-extra-dark-gray text-uppercase margin-5px-bottom" style="font-size: 40px; line-height: 3.5rem">Principales Servicios que Brindamos en el Laboratorio N°6 de Electricidad <br> <br> <div style="font-size: 60px">FIEE-UNI</div>  </h5>
                        <p class="mb-0">
                        </p>
                    </div>
                </div>

                <!-- Menu de Servicios 1 -->
                <div class="row align-self-stretch">
                    <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/1.png') }}" width="60%"
                                              style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Contraste y calibración de equipos e instrumentos de medición
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Analizador de redes, balanza, década resistiva, tacómetro, revelador de tensión, telurómetro, megóhmetro, milióhmetro, torquímetro, etc.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/16.png') }}" width="60%"
                                             style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Ensayos eléctricos a todo tipo de materiales eléctricos
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Por ejemplo: canaletas, cemento conductivo, electrodos, escaleras, manguera antiestática, manta dieléctrica, pértiga telescópica, etc.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/2.png') }}" width="60%"
                                             style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Pruebas a transformadores
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Ya sean de medida o distribución, monofásicos o trifásicos; contamos con todos los equipos necesarios.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/3.png') }}" width="60%"
                                             style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Ensayos dieléctricos a aceite de transformadores, resinas y solventes.
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Realizada con nuestro moderno espinterómetro y en base en la Norma Técnica ASTM D877 / D877M-13.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                </div>

                    <!-- Menu de Servicios 2 -->
                    <div class="row">
                    <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/4.png') }}" width="60%"
                                             style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Pruebas de medición a sistema de puesta a tierra
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Realizamos mantenimiento de SPAT el cual incluye un protocolo de prueba con garantía de 1 año.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/5.png') }}" width="60%"
                                             style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Ensayos a brazos hidráulicos y canastillas
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Basados en la Norma Técnica ANSI-SAIA A92.2 para dispositivos de elevación y rotación montados en vehículos.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/6.png') }}" width="60%"
                                             style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Pruebas eléctricas a equipos de protección personal
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Contamos con el material y equipo necesario para probar guantes de trabajo, cascos de seguridad, zapatos dieléctricos, arnés y línea de vida.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/7.png') }}" width="60%"
                                             style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Ensayo a armarios, tableros y gabinetes eléctricos de BT y MT.
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Consiste en el control dimensional y las pruebas de impacto y hermeticidad, IK e IP respectivamente.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                </div>


                    <!-- Menu de Servicios 3 -->
                    <div class="row">
                    <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/8.png') }}" width="60%"
                                             style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Pruebas eléctricas a equipos de alta tension
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Estos podrían ser: pararrayos, aisladores poliméricos y de porcelana, seccionadores, interruptores de potencia, etc.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/9.png') }}" width="60%"
                                             style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Ensayo a luminarias y lámparas LED
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Nuestro laboratorio cuenta con una sala especialmente implementada para medir la iluminancia (lux) y flujo luminoso (lm).
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/10.png') }}" width="60%" style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Pruebas a conductores eléctricos desnudos y protegidos de BT, MT y AT
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Seguimos los rigurosos procedimientos de acuerdo a las Normas Técnicas Peruanas - IEC que aplican en cada caso.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/2.png') }}" width="60%" style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Calificación energética a calentadores
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Nuestro moderno laboratorio de Eficiencia energética, único en el país, nos permite evaluar calentadores de uso doméstico.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                </div>


                    <!-- Menu de Servicios 4 -->
                    <div class="row">
                    <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/11.png') }}" width="60%" style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Prueba de UPS y estabilizadores de tensión
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Para evaluar el funcionamiento un sistema de alimentación ininterrumpida empleamos la norma IEC 62040 – parte 3 (2011).
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/12.png') }}" width="60%" style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Ensayos eléctricos a equipos electrodomésticos
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Desde ventiladores hasta equipos de refrigeración, según la Norma Técnica IEC 60335-2 “Aparatos electrodomésticos y similares”.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/13.png') }}" width="60%" style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Prueba a medidores de energía eléctrica
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Para medidores electrónicos y analógicos. Los requisitos se basan en la norma técnica IEC 62052-11 y 62053-24.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/14.png') }}" width="60%" style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Ensayo de interruptores de diferentes tipos
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Consiste en el examinar grado de protección IK e IP. Así como el funcionamiento a condición nominal.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    </div>

                    <!-- Menu de Servicios 5 -->
                    <div class="row">
                    <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/19.png') }}" width="60%" style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Pruebas a duchas electricas
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Medimos los parámetros eléctricos según IEC 60335-2-105:2016 ¨Requerimientos particulares para ducha multifuncional”.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/18.png') }}" width="60%" style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Ensayos a trajes anti arco eléctrico
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Para probar la resistencia al flameo de este EPP, nos ceñimos a la Norma Técnica ASTM F1506-19.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 sm-margin-eight-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom sm-margin-10px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/17.png') }}" width="60%" style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Prueba a pértiga telescópica
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            Además de medir la resistencia del aislamiento, hacemos la prueba de tensión aplicada a frecuencia industrial 60Hz.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    <!-- end services item -->
                    <!-- start services item -->
                    <div class="col-12 col-lg-3 col-md-6 wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s">
                        <div style="height:25rem;" class="bg-white box-shadow-light text-center padding-eighteen-tb feature-box-8 position-relative z-index-5">
                            <div class="d-inline-block margin-20px-bottom">
                                <div class="icon-ser">
                                    <center>
                                        <img src="{{ asset('images/images/servicios/20.png') }}" width="60%" style="padding:1rem 0 " alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom">
                            Ensayo a semáforo peatonal led animado
                            </div>
                            <p class="width-75 lg-width-90 mx-auto" style="text-align:justify;">
                            A estos equipos les realizamos pruebas contra impactos y verificación de hermeticidad, según su grado de protección.
                            </p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div>
                    </div>
                    </div>


            </div>
        </section>


        <section class="parallax wow fadeIn" data-stellar-background-ratio="0.4" style="background-color:#5F0000;" >


            <div class="container">
                <div class="row">
                    <!-- start feature box item -->
                    <div class="col-12 col-lg-4 last-paragraph-no-margin md-margin-30px-bottom wow fadeInRight">
                        <div class="padding-50px-all lg-padding-40px-all sm-padding-30px-all bg-white box-shadow text-center" style="height: 650px;">
                            <div class="d-inline-block rounded-circle margin-40px-bottom sm-margin-30px-bottom bg-light-gray"><img src="{{ asset('images/images/Segundo/3.jpg') }}" style="height: 345px;" alt=""/></div>

                            <span class="alt-font text-extra-dark-gray font-weight-600 d-block margin-20px-bottom">
                                PRUEBA DE RESISTENCIA ELÉCTRICA</span>
                            <p>Empleando un Micro Ohmímetro Digital MEGGER DLRO 200.</p>
                        </div>
                    </div>
                    <!-- end feature box block -->
                    <!-- start feature box item -->
                    <div class="col-12 col-lg-4 last-paragraph-no-margin md-margin-30px-bottom wow fadeInRight" data-wow-delay="0.2s">
                        <div class="padding-50px-all lg-padding-40px-all sm-padding-30px-all bg-white box-shadow text-center" style="height: 650px;">
                            <div class=" d-inline-block rounded-circle margin-40px-bottom sm-margin-30px-bottom bg-light-gray"><img src="{{ asset('images/images/Segundo/2.jpg') }}" alt=""/></div>

                            <span class="alt-font text-extra-dark-gray font-weight-600 d-block margin-20px-bottom">
                                MEDICIÓN DE LA RESISTENCIA DE AISLAMIENTO</span>
                            <p>Con el conductor sumergido en agua, utilizamos un Insulation tester MEGGER MIT 1025 para aplicar 1kV durante 1minutos, en el caso de conductores de BT..</p>
                        </div>
                    </div>
                    <!-- end feature box block -->
                    <!-- start feature box item -->
                    <div class="col-12 col-lg-4 last-paragraph-no-margin wow fadeInRight" data-wow-delay="0.4s">
                        <div class="padding-50px-all lg-padding-40px-all sm-padding-30px-all bg-white box-shadow text-center" style="height: 650px;">
                            <div class="d-inline-block rounded-circle margin-40px-bottom sm-margin-30px-bottom bg-light-gray"><img src="{{ asset('images/images/Segundo/1.jpg') }}" alt=""/></div>

                            <span class="alt-font text-extra-dark-gray font-weight-600 d-block margin-20px-bottom">TENSIÓN APLICADA</span>
                            <p>Utilizando una fuente AC y manteniendo el conductor sumergido en agua, aplicamos tensión durante el tiempo que indica la norma (por ejemplo, 4kV durante 5min en caso de conductores de MT)</p>
                        </div>
                    </div>
                    <!-- end feature box block -->
                </div>
            </div>
        </section>





<section class="wow fadeIn padding-90px-top md-padding-50px-top sm-padding-30px-top" style="background-color:  rgb(241, 255, 204);">
            <div>
                <h3 style="text-align:center">Pruebas a cables de energia de baja y media tension</h3>
            </div>
            <!-- start filter content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 px-3 p-md-0">
                        <div class="filter-content overflow-hidden">
                            <ul class="portfolio-grid portfolio-metro-grid work-4col hover-option5 gutter-large">
                                <li class="grid-sizer"></li>
                                <!-- start portfolio item -->
                                <li class="grid-item web advertising wow zoomIn">

                                        <figure>
                                            <div class="portfolio-img"><img src="{{ asset('images/images/Segundo/1g.jpg') }}" alt=""/></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light2 position-relative"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            Pruebas a cables de energia de baja y media tension
                                                            </span>
                                                            <p class="text-medium-gray letter-spacing-1 text-uppercase text-extra-small">
                                                            El espesor del aislamiento
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio-item item -->
                                <li class="grid-item branding grid-item-double wow zoomIn" data-wow-delay="0.2s">

                                        <figure>
                                            <div class="portfolio-img"><img src="{{ asset('images/images/Segundo/5g2.jpg') }}" alt=""/></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light2 position-relative"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            Pruebas a cables de energia de baja y media tension
                                                            </span>
                                                            <p class="text-medium-gray letter-spacing-1 text-uppercase text-extra-small">el Espesor de la cubierta
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item web design wow zoomIn" data-wow-delay="0.4s">

                                        <figure>
                                            <div class="portfolio-img"><img src="{{ asset('images/images/Segundo/3g.jpg') }}" alt=""/></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light2 position-relative"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            Pruebas a cables de energia de baja y media tension
                                                            </span>
                                                            <p class="text-medium-gray letter-spacing-1 text-uppercase text-extra-small">
                                                            Determinar la cantidad y el diámetro de los hilos del conductor
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>

                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item advertising photography wow zoomIn">

                                        <figure>
                                            <div class="portfolio-img"><img src="{{ asset('images/images/Segundo/4g.jpg') }}" alt=""/></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light2 position-relative"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            Pruebas a cables de energia de baja y media tension
                                                            </span>
                                                            <p class="text-medium-gray letter-spacing-1 text-uppercase text-extra-small">Medir el diámetro exterior del conductor
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
                                <li class="grid-item web design wow zoomIn" data-wow-delay="0.2s">

                                        <figure>
                                            <div class="portfolio-img"><img src="{{ asset('images/images/Segundo/2g.jpg') }}" alt=""/></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-deep-pink mx-auto separator-line-horrizontal-medium-light2 position-relative"></div>
                                                            <span class="font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block">
                                                            Pruebas a cables de energia de baja y media tension
                                                            </span>
                                                            <p class="text-medium-gray letter-spacing-1 text-uppercase text-extra-small">
                                                            Determinar el peso de 1m del conductor
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end filter content -->

        <div class="row">

                            <div class="">
                                <a href="#" type="button" class="btn btn-dec" target="blank">
                                    Boton para Cotizaciones de Ensayos y Calibraciones
                                </a>
                            </div>

                        </div>
        </section>
@endsection