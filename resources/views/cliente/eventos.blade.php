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

            <!-- start section -->
            <section class="wow fadeIn" style="padding:15px 0;background-color: rgb(241, 255, 204);" >
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12">
                            <div class="alt-font text-deep-pink margin-15px-bottom">Eventos Cercanos:</div>
                            <h4 class="text-extra-dark-gray font-weight-600 letter-spacing-minus-1 alt-font">
                            FERIA TECNOLÓGICA DEL LAB. N°6 DE ELECTRICIDAD FIEE UNI
                            </h4>
                            <div class="separator-line-horrizontal-medium-light bg-deep-pink margin-10px-top"></div>
                        </div>
                        <div class="col-xl-6 offset-xl-1 col-lg-7 col-md-12 col-sm-12 padding-40px-top">
                            <div class="row">
                                <div class="col-12 margin-three-bottom">
                                    <p class="text-large text-extra-dark-gray">
                                    Feria Tecnologica del Lab. N°6 de Electricidad FIEE UNI
                                    </p>
                                    <p class="text-medium line-height-28" style="text-align: justify;">
                                    Este magno evento contará con la participación de las principales empresas del rubro energético y el apoyo de los alumnos de la especialidad de Ingeniería Eléctrica. El objetivo será mostrar los nuevos equipos adquiridos por el laboratorio y las experiencias académicas que se desarrollan para complementar la teoría aprendida en los cursos de carrera. Además, contará con la exhibición modernos equipos que las empresas nos facilitarán para poder capacitar a los participantes en las nuevas tecnologías desarrolladas en la actualidad.
                                    </p>
                                </div>
                                <!-- icon box item -->

                                <!-- end icon box item -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="wow fadeIn" style="padding:15px 0;background-color: rgb(241, 255, 204);" >
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12">
                            <div class="alt-font text-deep-pink margin-15px-bottom">Eventos Cercanos:</div>
                            <h4 class="text-extra-dark-gray font-weight-600 letter-spacing-minus-1 alt-font">
                            VISITAS TÉCNICAS
                            </h4>
                            <div class="separator-line-horrizontal-medium-light bg-deep-pink margin-10px-top"></div>
                        </div>
                        <div class="col-xl-6 offset-xl-1 col-lg-7 col-md-12 col-sm-12 padding-40px-top">
                            <div class="row">
                                <div class="col-12 margin-three-bottom">
                                    <p class="text-large text-extra-dark-gray">
                                    Visitas Tecnicas
                                    </p>
                                    <p class="text-medium line-height-28" style="text-align: justify;">
                                    Como parte de nuestro aporte educativo para con la FIEE UNI, el Laboratorio N°6 de Electricidad y el Centro Cultural de Ingeniería Eléctrica trabajarán en conjunto para realizar, de manera ordenada y formal, una serie de Visitas Técnicas a las principales empresas eléctrica, subestaciones y centrales de generación (convencional y/o renovables). Nuestra principal misión será acercar a los alumnos de nuestra facultad a experiencias de campo para ampliar su visión de la carrera en cuanto a labores que realizarán y conocimientos adicionales que necesitarán para poder desempeñarse correctamente en el mercado laboral.
                                    </p>
                                </div>
                                <!-- icon box item -->

                                <!-- end icon box item -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@endsection