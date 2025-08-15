@extends('layouts.admin')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Listado de Contactos</h1>
      </div>
      <div class="col-sm-6 text-right">
        <a class="btn btn-info" href="{{ route('contacto.create') }}">Agregar Contacto</a>
      </div>        
    </div>
  </div>
</section>
<!-- /Content Header -->
    
<!-- Main Content-->
<section class="content">
    <indexcontacto-component></indexcontacto-component>
</section>
<!-- /Main Content-->

@endsection