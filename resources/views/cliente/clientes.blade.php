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

        <section class="bg-light-gray" style="padding: 40px 0;background-color: rgb(241, 255, 204);">
            <div class="container">
                <div class="row justify-content-center" >
                    <div class="col-12 col-lg-6 col-md-8 margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center last-paragraph-no-margin" style="margin-bottom:40px;">
                        <h5 class="alt-font font-weight-700 text-extra-dark-gray  text-uppercase">
                        Nuestros Principales Clientes
                        </h5>
                        <p>
                        A continuacion se muestran los principales clientes con los que cuenta el laboratorio N°6 de Electricidad de la Facultad de Ingenieria Electrica y Electronica de la Universidad Nacional de Ingenieria
                        </p>
                    </div>
                </div>
                <div class="row">
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente1.png') }}"
                            alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente2.png') }}"
                            alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente3.png') }}"
                            alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente4.png') }}"
                            alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente5.png') }}"
                            alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente6.png') }}"
                            alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente7.png') }}"
                            alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente8.png') }}"
                             alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom md-no-margin">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente9.png') }}"
                            alt=""/>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente10.png') }}" alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente11.png') }}" alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom md-no-margin">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente12.png') }}" alt=""/>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente13.png') }}" alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente14.png') }}" alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                    <!-- start client logo item -->
                    <div class="col-12 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="bg-white clients-list text-center d-flex align-items-center justify-content-center w-100 margin-30px-bottom md-no-margin">
                            <img style="height:190px;width:auto" src="{{ asset('images/images/catorceavo/cliente15.png') }}" alt=""/>
                        </div>
                    </div>
                    <!-- end client logo item -->
                </div>
            </div>
        </section>
@endsection