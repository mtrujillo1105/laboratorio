@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/css-web/jquery.tagsinput.css') }}">
<!-- Content Header-->
<section class="content-header">
  <div class="container-fluid">
    <div class="row titulo-vista">
      <h5>Agregar Cotización de Ensayo</h5>
    </div>
  </div>
</section>
<!-- /Content Header-->

<!-- Main Content-->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <createcotizacion-component token="{{csrf_token()}}"
            :user="{{ json_encode(Auth::user()) }}">
        </createcotizacion-component>
      </div>
    </div>
  </div>
</section>
<!-- /Main Content-->

@endsection
