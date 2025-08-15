@extends('layouts.cliente')

@section('title', 'Laboratorio N°6 de Electricidad FIEE-UNI')

@section('content')
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

        <!-- inicio del texto del servicio academico capacitacion en el laboratorio (I) -->
        <div class="container" style="margin-top:40px;margin-bottom:40px;">
        <div class="row align-items-center">
                    <div class="col-12 col-lg-5 text-center md-margin-50px-bottom wow fadeInLeft">
                        <img src="http://placehold.it/900x650" alt="" class="width-100">
                    </div>
                    <div class="col-12 col-lg-7 padding-six-lr md-padding-eight-lr text-center text-lg-left sm-padding-15px-lr wow fadeInRight last-paragraph-no-margin" data-wow-delay="0.2s">
                        <span class="text-deep-pink alt-font margin-10px-bottom md-no-margin-bottom d-inline-block text-medium">
                        Asesorias y servicios IN-HOUSE
                        </span>
                        <h5 class="font-weight-600 alt-font text-extra-dark-gray">Análisis del Estado de sus instalaciones (Calidad de la Energía)</h5>
                        <p>Descripcion del servicio --> of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum is printing and typesetting simply dummy text.</p>
                        <center>
                        <a href="about-us-simple.html" class="btn btn-dark-gray btn-small text-extra-small border-radius-4 margin-30px-top"><i class="fas icon-very-small margin-5px-right ml-0" aria-hidden="true"></i>Descripcion</a>
                        </center>
                    </div>
                </div>
        </div>

        <div class="container" style="margin-top:40px;margin-bottom:40px;">
        <div class="row align-items-center">
                    <div class="col-12 col-lg-5 text-center md-margin-50px-bottom wow fadeInLeft">
                        <img src="http://placehold.it/900x650" alt="" class="width-100">
                    </div>
                    <div class="col-12 col-lg-7 padding-six-lr md-padding-eight-lr text-center text-lg-left sm-padding-15px-lr wow fadeInRight last-paragraph-no-margin" data-wow-delay="0.2s">
                        <span class="text-deep-pink alt-font margin-10px-bottom md-no-margin-bottom d-inline-block text-medium">
                        Asesorias y servicios IN-HOUSE
                        </span>
                        <h5 class="font-weight-600 alt-font text-extra-dark-gray">Mantenimiento de Tableros Electricos etc...</h5>
                        <p>Descripcion del servicio --> of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum is printing and typesetting simply dummy text.</p>
                        <center>
                        <a href="about-us-simple.html" class="btn btn-dark-gray btn-small text-extra-small border-radius-4 margin-30px-top"><i class="fas icon-very-small margin-5px-right ml-0" aria-hidden="true"></i>Descripcion</a>
                        </center>
                    </div>
                </div>
        </div>

        <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-color:#800404">
            <div class="opacity-full bg-black"></div>
            <div class="container">
                <div class="row justify-content-center" style="margin-top:1px;padding-top:1px;">
                    <!-- start contact-form head -->
                    <div class="col-12 col-xl-5 col-md-12 text-center" >
                        <div class="text-small text-medium-gray alt-font text-uppercase margin-5px-bottom">Comuniquese con Nosotros</div>

<h5 class="text-white-2 font-weight-600" style="width:100%;font-weight: 50;font-size: 20px;line-height: 31px;margin: 5px 5px 20px auto;">
Llene el siguiente Formulario y nos comunicaremos con usted para absolver cualquier duda sobre las asesorias in house que realizamos en el Laboratorio
</h5>

                    </div>
                    <!-- end contact-form head -->
                </div>
                <!-- start contact-form -->
                <form id="project-contact-form" method="post" action="{{ route('asesorias.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div id="success-project-contact-form" class="mx-0"></div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" name="nombre_emp" id="nombre_emp" placeholder="Nombre de la Empresa *" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" name="nombre_contact" id="nombre_contact" placeholder="Nombre del Contacto *" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" name="email_contact" id="email_contact" placeholder="Correo Electronico del Contacto *" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" name="celular_contact" id="celular_contact" placeholder="Celular del Contacto *" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="select-style medium-select border-color-medium-dark-gray">
                                <select name="asesoria" id="asesoria" class="bg-transparent mb-0">
                                    <option value="">Seleccione la Asesoria</option>
                                    <option value="Calidad de la Energia">Calidad de la Energia</option>
                                    <option value="Mantenimiento de Tableros">Mantenimiento de Tableros</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <textarea name="comment" id="comment" placeholder="Describa la Asesoria Seleccionada *" rows="6" class="bg-transparent border-color-medium-dark-gray medium-textarea"></textarea>
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