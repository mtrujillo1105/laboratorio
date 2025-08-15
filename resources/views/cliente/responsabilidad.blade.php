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

        <section id="home" class="p-3 parallax wow fadeIn" style="background-color: #800404;margin-bottom:10px;height:380px;border-color:#800404">
            <div class="opacity-full bg-extra-dark-gray"></div>
            <div class="container position-relative one-fourth-screen" style="padding-bottom:1px;">
                <div class="slider-typography text-center" style="margin-bottom:40px;">
                    <div style="margin-top:50px;margin-bottom:50px;">
                        <div class="slider-text-middle" style="padding-bottom:30px;">
                            <span class="text-white-2 alt-font font-weight-600 title-large d-block margin-20px-bottom">Responsabilidad Social</span>
                            <span class="width-60 mx-auto text-light-gray text-outside-line alt-font sm-width-100 sm-padding-15px-lr d-inline-block d-md-inline" style="">Compromiso &nbsp;&nbsp; • &nbsp;&nbsp; Educación &nbsp;&nbsp; • &nbsp;&nbsp; Desarrollo</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start project overview section -->
        <section class="wow fadeIn" style="background-color: rgb(241, 255, 204);padding-top:30px;height:700px;">
            <div class="container">
                <div class="row" >
                    <div class="col-12 col-lg-8 col-md-10 mx-auto text-center last-paragraph-no-margin margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom" style="width:100%;">
                        <p class="" style="color:#800404;text-align:justify;font-size:35px;line-height:45px;">
                        Durante el transcurso del año, el Laboratorio N°6 de Electricidad FIEE UNI invitará a diversos colegios de Lima a visitar nuestras instalaciones. Esta visita será guiada por nuestro personal técnico, el mismo que les mostrará de manera didáctica algunas de las experiencias académicas que se realizan aquí, como parte de la cátedra que complementa los cursos de nuestra malla curricular.
                        <p class="text-large text-medium-gray" style="color:#800404;text-align:justify;font-size:35px;line-height:45px;">
                        Nuestra misión como institución es despejar las dudas que puedan tener los jóvenes sobre la Ingeniería Eléctrica e incentivarlos a estudiar una carrera universitaria en la UNI.
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end project overview section -->
        <!-- start project gallery section -->
        <section class="p-0" style="margin-bottom: 50px;background-color: rgb(241, 255, 204);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-3 col-md-6 text-center md-margin-30px-bottom wow fadeInRight">
                        <img src="http://placehold.it/620x920" alt=""/>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6 text-center md-margin-30px-bottom wow fadeInRight" data-wow-delay="0.2s">
                        <img src="http://placehold.it/620x920" alt=""/>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6 sm-margin-30px-bottom text-center wow fadeInRight" data-wow-delay="0.4s">
                        <img src="http://placehold.it/620x920" alt=""/>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6 text-center wow fadeInRight" data-wow-delay="0.6s">
                        <img src="http://placehold.it/620x920" alt=""/>
                    </div>
                </div>
            </div>
        </section>
@endsection