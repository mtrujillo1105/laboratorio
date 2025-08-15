@extends('layouts.cliente')

@section('title', 'Laboratorio N°6 de Electricidad FIEE-UNI')

@section('content')
        <style>
            .swiper-pagination-white .swiper-pagination-bullet-active {
                background: #023A18 !important;
                padding: 0.6rem 0;
            }
            .swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet {
                background: #023A18 !important;
                padding: 0.6rem 0;
            }
            .swiper-pagination-white .swiper-pagination-bullet{
                background: #023A18 !important;
                padding: 0.6rem 0;
            }
            .swiper-pagination-white .swiper-pagination-bullet {
                background: #023A18 !important;
                padding: 0.6rem 0;
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

        <div class="box-layout box-layout-md" style="background-color:rgb(241, 255, 204);">

            <!-- start slider section -->
            <section class="p-0 main-slider h-100 mobile-height wow fadeIn" >
                <div class="swiper-full-screen swiper-container h-100 w-100 white-move">
                    <div class="swiper-wrapper">
                        <!-- start slider item -->
                        <div class="swiper-slide">
                            <div class="row m-0">
                                <div class="col-12 col-md-6 d-flex align-items-center bg-deep-pink height-700px sm-height-250px" style="background-color:rgb(107, 0, 0);">
                                    <div class="text-left padding-twelve-all sm-padding-five-all width-100">
                                        <h6 class="title-large text-white-2 font-weight-600" style="font-size: 40px;line-height:40px;color:white;text-align:center;">
                                        Ubicacion del Laboratorio
                                        </h6>
                                        <p class="text-large font-weight-300 margin-30px-top width-65 lg-width-75 md-width-90 text-white-2 d-block sm-margin-15px-top" style="text-align: justify;color:white;width: 450px;">
                                        El laboratorio N°6 de Electricidad de la Facultad de Ingeniería Eléctrica está conformado por los pabellones A y S de la Universidad Nacional de Ingeniería. El acceso peatonal más cercano a nuestras instalaciones es por las puertas N°3 y N°6 respectivamente. Si su visita la realiza en un vehículo, las entradas más próximas son la puerta N°2 y N°5.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 cover-background height-700px sm-height-400px">
                                    <img src="{{ asset('images/images/octavo/Imagen1.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <!-- end slider item -->
                        <!-- start slider item -->
                        <div class="swiper-slide">
                            <div class="row m-0">
                                <div class="col-12 col-md-6 d-flex align-items-center bg-deep-pink height-700px sm-height-250px" style="background-color:rgb(107, 0, 0);">
                                    <div class="text-left padding-twelve-all sm-padding-five-all width-100">
                                        <h6 class="title-large text-white-2 font-weight-600" style="font-size: 40px;line-height:40px;color:white;text-align:center;margin-top: 50px;">
                                        Ubicacion del Laboratorio
                                        </h6>
                                        <p class="text-large font-weight-300 margin-30px-top width-65 lg-width-75 md-width-90 text-white-2 d-block sm-margin-15px-top" style="text-align: justify;color:white;width: 450px;">
                                        La Universidad Nacional de Ingeniería se encuentra ubicado en la Av. Túpac Amaru 210 (Apartado postal 1301) en el distrito del Rimac en la región Lima, Perú. Se puede llegar al campus dirigiéndose hacia la intersección de las avenidas Tupac Amaru y Eduardo de Habich. En caso de estar realizando su viaje en transporte público, puede ingresar a la Universidad en los paraderos UNI (Puerta N° 3 y 4) y/o Honorio Delgado (Puerta N° 5) del Metropolitano.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 cover-background height-700px sm-height-400px">
                                    <img src="{{ asset('images/images/octavo/Imagen2.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <!-- end slider item -->
                        <!-- start slider item -->
                        <!-- end slider item -->
                    </div>
                    <!-- start slider pagination -->
                    <div class="swiper-pagination swiper-pagination-square swiper-pagination-white swiper-full-screen-pagination" ></div>
                    <div class="swiper-button-next swiper-button-black-highlight d-none "></div>
                    <div class="swiper-button-prev swiper-button-black-highlight d-none "></div>
                    <!-- end slider pagination -->
                </div>
            </section>
            <!-- end slider section -->
            <!-- start feature box section -->
            <!-- end feature box section -->
            <!-- start section -->
            <!-- end section -->
            <!-- start counter section -->
            <!-- end counter section -->
            <!-- start parallax with feature box section -->
            <!-- end parallax with feature box section -->
            <!-- start feature box section -->
            <!-- end feature box section -->
            <!-- start portfolio section -->
            <!-- end portfolio section -->
            <!-- start rotate box style 02 section -->
            <!-- end rotate box style 02 section -->
            <!-- start feature box section -->
            <!-- end feature box section -->
            <!-- start team section -->
            <!-- end team section -->
            <!-- start feature box section -->
            <!-- end feature box section -->
            <!-- start progress bar section -->
            <!-- end progress bar section -->
            <!-- start section -->
            <!-- end section -->
            <!-- start clients slider section -->
            <!-- end clients slider section -->
            <!-- start testimonial slider section -->
            <!-- end testimonial slider section -->
            <!-- start tabs section -->
            <!-- end tabs section -->
            <!-- start feature box section -->
            <!-- end feature box section -->
            <!-- start blog section -->
            <!-- end blog section -->
        </div>
@endsection