@extends('layouts.cliente')

@section('title', 'Laboratorio Nº6 de Electricidad de la Facultad de Ingeniería Eléctrica y Electrónica -
Universidad Nacional de Ingeniería')

@section('content')
<style>
    .edward {
        color: green !important;
        background-color: white !important;
        border: 1px solid green !important;
        border-radius: 10px !important;
    }

    .edward:hover {
        color: white !important;
        background-color: green !important;
        border-radius: 10px !important;
    }

    .btn-dec {
        border: 1px solid white !important;
        color: white !important;
        width: 75% !important;
    }

    .btn-dec:hover {
        color: rgb(107, 0, 0) !important;
        background-color: white !important;
        font-weight: bold;
    }

    .men {
        background-color: #800404;
        text-align: center;
    }

    #header {
        width: fit-content;
        font-family: Arial, Helvetica, sans-serif;
        padding-left: 15rem;
    }

    ul,
    ol {
        list-style: none;
    }

    .nav>li {
        float: left;
        padding: 1rem 0.5rem;
    }

    .nav li a {
        background-color: #800404;
        color: #fff;
        text-decoration: none;
        padding: 10px 12px;
        display: block;
        font-weight: bold;
        text-align: left;
    }

    .nav li a:hover,
    .nav li:hover {
        background-color: #8e0606;
    }

    .nav li ul {
        display: none;
        position: absolute;
        min-width: 140px;
        z-index: 9999;

    }

    .nav li:hover>ul {
        display: block;
        padding-top: 1rem;
    }

    .nav li ul li {
        position: relative;
    }

    .nav li ul li ul {
        right: -140px;
        top: 0px;
    }

    #txt-emails-envio-cotizacion_tag {
        width: 200px;
    }
</style>
<link rel="stylesheet" href="{{ asset('css/css-web/jquery.tagsinput.css') }}">

<div class="row mt-4">
    <div class="col-sm-11 mx-auto text-center">
        <h2 class="my-4 font-weight-bold" style="color: #800404;">Formulario de Solicitud de Capacitación</h2>
    </div>
</div>
<form ref="form">
    @csrf
    <div id="app" class="mb-4">
        <capacitaciones></capacitaciones>
    </div>
</form>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/js-web/jquery.tagsinput.js') }}"></script>
<script>
    var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; // Expresión regular de email
    $('#txt-emails-envio-cotizacion').tagsInput({
        width: 'auto',
        pattern: emailRegex,
        defaultText:'Ingresar un email',
        'onAddTag' : function(e) {
            let value = $('#txt-emails-envio-cotizacion').val();
            let emails = value.split(',');
            if (emails.length == 5)
            {
                $('#txt-emails-envio-cotizacion').removeTag(emails[emails.length-1]);
                alert('no puede ingresar más de 4 correos electrónicos');
            }
        }
    });    

    $('#ver-emails').on('click', function() {
        let value = $('#txt-emails-envio-cotizacion').val();
        let emails = value.split(',');
        let emailsCount = 0;
        $.each(emails, (i, email) => emailsCount += (email.trim() == '') ? 0 : 1);
        if (emailsCount == 0)
            alert('ingrese por le menos un email');
        else
            alert(emails);
    });
</script>
@endsection