@extends('layouts.cliente')

@section('title', 'Laboratorio N°6 de Electricidad FIEE-UNI')

@section('content')
        <!-- inicio del texto del servicio academico capacitacion en el laboratorio (I) -->
        <style>
            .btn-dec{
                color:#800404;
                background-color:white;
                border-color:white;
                font-size:20px;
                font-weight: bold;
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
        <section class="wow fadeIn">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12">
                            <div class="alt-font text-deep-pink margin-15px-bottom">Servicio Academico</div>
                            <h4 class="text-extra-dark-gray font-weight-600 letter-spacing-minus-1 alt-font">
                            Capacitacion en el Laboratorio</h4>
                            <div class="separator-line-horrizontal-medium-light bg-deep-pink margin-10px-top"></div>
                        </div>
                        <div class="col-xl-6 offset-xl-1 col-lg-7 col-md-12 col-sm-12 padding-40px-top" style="margin-left:10px;">
                            <div class="row">
                                <div class="col-12 margin-three-bottom" style="text-align:justify;">

                                    <p class="text-medium line-height-28">
                                    Los estudiantes y docentes de Ing. Eléctrica de otras universidades del país, también podrán participar en nuestras visitas guiadas. Con ellos se intentará fortalecer los conceptos teóricos previamente estudiados, a través de un conjunto de experiencias demostrativas.
                                    </p>
                                    <p class="text-medium line-height-28">
                                    Nuestro objetivo es brindar el apoyo académico necesario para complementar su formación académica en Ing. Eléctrica en cursos como: Máquinas Eléctricas Estáticas y Rotativas, Medidas Eléctricas I y II, Alta Tensión, etc.
                                    </p>
                                    <p class="text-medium line-height-28">
                                    Contamos con instrumentos calibrados y Profesionales altamente calificados que se encuentran a nuestra entera disposición para llevar a cabo este tipo de actividades, por lo que les sugerimos se pongan en contacto con nosotros para brindarles más información y poder programar con ustedes una asesoría académica de este tipo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <!-- inicio de las imagenes del servicio academico capacitacion en el laboratorio (I)-->
        <section class="p-0 wow fadeIn">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-12 filter-content overflow-hidden">
                            <ul class="portfolio-grid work-4col hover-option2">
                                <li class="grid-sizer"></li>
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp">
                                    <a href="single-project-page-01.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Black and White</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Branding and Brochure</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp" data-wow-delay="0.2s">
                                    <a href="single-project-page-02.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x1600" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Banana Design</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Logo and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp" data-wow-delay="0.4s">
                                    <a href="single-project-page-03.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Design Blast</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Web and Photography</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp" data-wow-delay="0.6s">
                                    <a href="single-project-page-04.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Kaya Skin Care</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Logo and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp">
                                    <a href="single-project-page-05.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Herbal Beauty Salon</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Branding and Brochure</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp"  data-wow-delay="0.4s">
                                    <a href="single-project-page-06.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Pixflow Studio</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Branding and Brochure</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp" data-wow-delay="0.6s">
                                    <a href="single-project-page-07.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Large bite</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                            </ul>
                        </div>
                    </div>
                </div>
        </section>




        <!-- inicio del texto del servicio academico asesoria en la implementacion de laboratorios de electricidad (II) -->
        <section class="wow fadeIn">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12">
                            <div class="alt-font text-deep-pink margin-15px-bottom">Servicio Academico</div>
                            <h4 class="text-extra-dark-gray font-weight-600 letter-spacing-minus-1 alt-font">
                            Asesoria para la Implementación de Laboratorios de Electricidad</h4>
                            <div class="separator-line-horrizontal-medium-light bg-deep-pink margin-10px-top"></div>
                        </div>
                        <div class="col-xl-6 offset-xl-1 col-lg-7 col-md-12 col-sm-12 padding-40px-top" style="margin-left:10px;">
                            <div class="row">
                                <div class="col-12 margin-three-bottom">

                                    <p class="text-medium line-height-28" style="text-align:justify;">
                                    De ser solicitado, también podemos brindar asesoramiento técnico-económico para la mejora o implementación de un moderno Laboratorio de Electricidad en su Universidad. La experiencia adquirida gracias al nuevo Laboratorio de Alta Tensión que se está por ejecutar en la FIEE UNI, nos da la pericia necesaria para brindar este tipo de servicio.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




        <!-- inicio de las imagenes del servicio academico asesoria en la implementacion de laboratorios de electricidad (II)-->
        <section class="p-0 wow fadeIn" style="margin-bottom:100px;">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-12 filter-content overflow-hidden">
                            <ul class="portfolio-grid work-4col hover-option2">
                                <li class="grid-sizer"></li>
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp">
                                    <a href="single-project-page-01.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Black and White</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Branding and Brochure</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp" data-wow-delay="0.2s">
                                    <a href="single-project-page-02.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x1600" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Banana Design</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Logo and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp" data-wow-delay="0.4s">
                                    <a href="single-project-page-03.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Design Blast</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Web and Photography</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp" data-wow-delay="0.6s">
                                    <a href="single-project-page-04.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Kaya Skin Care</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Logo and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp">
                                    <a href="single-project-page-05.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Herbal Beauty Salon</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Branding and Brochure</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp"  data-wow-delay="0.4s">
                                    <a href="single-project-page-06.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Pixflow Studio</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Branding and Brochure</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                                <!-- start portfolio item -->
                                <li class="grid-item wow fadeInUp" data-wow-delay="0.6s">
                                    <a href="single-project-page-07.html">
                                        <figure>
                                            <div class="portfolio-img bg-deep-pink"><img src="http://placehold.it/800x800" alt=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-left">
                                                    <div class="portfolio-hover-box align-bottom">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2"></div>
                                                            <span class="line-height-normal alt-font text-white-2 text-uppercase margin-one-half-bottom d-block font-weight-600">Large bite</span>
                                                            <p class="text-white-2 text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- end portfolio item -->
                            </ul>
                        </div>
                    </div>
                </div>
            </section>


        <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-color:#800404">
            <div class="opacity-full bg-black"></div>
            <div class="container">
                <div class="row justify-content-center" style="margin-top:1px;padding-top:1px;">
                    <!-- start contact-form head -->
                    <div class="col-12 col-xl-5 col-md-12 text-center" >
                        <div class="text-small text-medium-gray alt-font text-uppercase margin-5px-bottom">Comuniquese con Nosotros</div>

<h5 class="text-white-2 font-weight-600" style="width:100%;font-weight: 50;font-size: 20px;line-height: 31px;margin: 5px 5px 20px auto;">
Llene el siguiente Formulario y nos comunicaremos con usted para absolver cualquier duda sobre los servicios academicos que brinda el Laboratorio
</h5>

                    </div>
                    <!-- end contact-form head -->

                </div>
                <!-- start contact-form -->
                <form id="project-contact-form" action="{{ route('servicio_academico.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div id="success-project-contact-form" class="mx-0"></div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" name="nombre" id="nombre" placeholder="Universidad de Procedencia *" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" name="nombre_contact" id="nombre_contact" placeholder="Nombre del Contacto *" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" name="email" id="email" placeholder="Correo Electronico del Contacto *" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" name="celular" id="celular" placeholder="Celular del Contacto *" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="select-style medium-select border-color-medium-dark-gray">
                                <select name="servicio" id="servicio" class="bg-transparent mb-0">
                                    <option value="">Seleccione el Servicio Academico</option>
                                    <option value="Capacitacion en Laboratorio">Capacitacion en Laboratorio</option>
                                    <option value="Implementacion en Laboratorio">Implementacion en Laboratorio</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <textarea name="comment" id="comment" placeholder="Describa el servicio academico solicitado *" rows="6" class="bg-transparent border-color-medium-dark-gray medium-textarea"></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button id="project-contact-us-button" type="submit" class="btn btn-rounded btn-large margin-20px-top sm-no-margin-top btn-dec">Enviar Datos</button>
                        </div>
                    </div>
                </form>
                <!-- end contact-form -->
            </div>
        </section>

@endsection