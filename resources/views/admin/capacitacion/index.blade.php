@extends('layouts.admin')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-8">
        <h1>Listado de Cotizaciones de Capacitaciones</h1>
      </div>
      <div class="col-sm-4 text-right">
        <a class="btn btn-info" href="{{ route('createCapacitacion') }}">Agregar Cotización</a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /Content Header -->

<!-- Main Content-->
<section class="content">
  <indexcotizacioncapacitacion-component token="{{csrf_token()}}"
  :user="{{ json_encode(Auth::user()) }}"></indexcotizacioncapacitacion-component>
</section>

@endsection
