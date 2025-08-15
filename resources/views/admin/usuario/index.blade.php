@extends('layouts.admin')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Listado de Usuarios</h1>
      </div>
      <div class="col-sm-6 text-right">
        <a class="btn btn-info" href="{{ route('usuario.create') }}">Agregar Usuario</a>
      </div>
    </div>
  </div>
</section>
<!-- /Content Header -->

<!-- Main Content-->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <indexusuario-component> </indexusuario-component>
      </div>
    </div>
  </div>
</section>
<!-- /Main Content-->

@endsection
