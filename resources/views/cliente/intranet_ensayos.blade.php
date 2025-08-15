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

        <div class="container-fluid" style="background-color: rgb(241, 255, 204);">
            <br>
            <h4 style="text-align:center;color:black;">Acceder a la Intranet de Ensayos</h4>
            <hr>
            <form action="" method="post" class="form-horizontal form-control" style="width:340px;height:240px;margin:0 auto;color:black;">
                Cuenta de Usuario:
                <input type="text" name="txtId" class="form-control" />
                Password:
                <input type="text" name="txtDNI" class="form-control" />
                <br>
                <input type="submit" value="Acceder" class="btn btn-primary" />
            </form>
            <br>
        </div>
        <!-- start page title section -->

@endsection