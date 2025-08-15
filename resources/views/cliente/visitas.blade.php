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

        <section class="big-section wow fadeIn bg-black" id="about" style="padding: 60px 0;padding-bottom:160px;">
            <div class="container-fluid" style="height:60px;">
                <div class="row" style="">
                    <div class="col-12 col-xl-5 col-lg-8 col-md-10 mx-auto text-center" >
                        <div class="" >Galeria de Imagenes</div>
                        <h4 class="alt-font font-weight-600 text-white-2 mb-0">
                        Visitas Tecnicas a Empresas, Laboratorios y Centrales
                        </h4>
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn p-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0 lightbox-portfolio">
                        <div id="justified" class="justified-gallery">
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp">
                                <a href="http://placehold.it/975x650" class="gallery-link"><img src="http://placehold.it/975x650" alt="Herbal Beauty Salon"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp" data-wow-delay="0.2s">
                                <a href="http://placehold.it/800x650" class="gallery-link"><img src="http://placehold.it/800x650" alt="Tailoring Interior"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp" data-wow-delay="0.4s">
                                <a href="http://placehold.it/488x650" class="gallery-link"><img src="http://placehold.it/488x650" alt="Pixflow Studio"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp" data-wow-delay="0.6s">
                                <a href="http://placehold.it/496x650" class="gallery-link"><img src="http://placehold.it/496x650" alt="Designblast Inc"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp">
                                <a href="http://placehold.it/1036x650" class="gallery-link"><img src="http://placehold.it/1036x650" alt="Harddot Stone"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp" data-wow-delay="0.2s">
                                <a href="http://placehold.it/488x650" class="gallery-link"><img src="http://placehold.it/488x650" alt="Educamp School"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp" data-wow-delay="0.4s">
                                <a href="http://placehold.it/1040x650" class="gallery-link"><img src="http://placehold.it/1040x650" alt="Branding Identity"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp">
                                <a href="http://placehold.it/975x650" class="gallery-link"><img src="http://placehold.it/975x650" alt="Violator Series"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp" data-wow-delay="0.2s">
                                <a href="http://placehold.it/974x650" class="gallery-link"><img src="http://placehold.it/974x650" alt="Third Eye Glasses"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp" data-wow-delay="0.4s">
                                <a href="http://placehold.it/852x650" class="gallery-link"><img src="http://placehold.it/852x650" alt="Herbal Beauty Salon"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp">
                                <a href="http://placehold.it/487x650" class="gallery-link"><img src="http://placehold.it/487x650" alt="Banana Design"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp" data-wow-delay="0.2s">
                                <a href="http://placehold.it/685x650" class="gallery-link"><img src="http://placehold.it/685x650" alt="Graphic Design"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp" data-wow-delay="0.4s">
                                <a href="http://placehold.it/975x650" class="gallery-link"><img src="http://placehold.it/975x650" alt="Web Interactive"></a>
                            </div>
                            <!-- end gallery item -->
                            <!-- start gallery item -->
                            <div class=" wow fadeInUp" data-wow-delay="0.6s">
                                <a href="http://placehold.it/487x650" class="gallery-link"><img src="http://placehold.it/487x650" alt="Digital Branding"></a>
                            </div>
                            <!-- end gallery item -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection