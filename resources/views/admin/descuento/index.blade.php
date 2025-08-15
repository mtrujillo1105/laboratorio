@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Descuentos por Curso</h1>
      </div>
      <div class="col-sm-6 text-right">
        <!-- actualizado por marck, usando ELOQUENT -->
        <a class="btn btn-info" href="{{ route('descuento.create') }}">Agregar Descuento</a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main Content-->
<section class="content">
    <indexdescuento-component></indexdescuento-component>
</section>

@endsection
