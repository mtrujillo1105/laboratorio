@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/css-web/jquery.tagsinput.css') }}">
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row titulo-vista">
      <h5>Editar Cotización de Ensayo - {{ $cotizacion->COTIP_Codigo}}</h5>
    </div>
  </div>
</section>
<!-- /Content Header-->

<!-- Main Content-->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <editcotizacion-component
            codigo="{{$cotizacion->COTIP_Codigo}}"
            token="{{csrf_token()}}"
            :user="{{ json_encode(Auth::user()) }}"></editcotizacion-component>
      </div>
    </div>
  </div>
</section>
<!-- Main Content-->

@endsection
