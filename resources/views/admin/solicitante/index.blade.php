@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Listado de Solicitantes</h1>
      </div>
      <div class="col-sm-6 text-right">
        <!-- actualizado por marck, usando ELOQUENT -->
        <a class="btn btn-info" href="{{ route('solicitante.create') }}">Agregar Solicitante</a>
        <!-- <a class="btn" data-toggle="tooltip" data-placement="bottom" title="Generar PDF" href="{{ route('cotizaciones.pdf') }}"><i class="far fa-file-pdf" style="color:red; font-size:30px; cursor:pointer;"></i></a> -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <indexsolicitante-component></indexsolicitante-component>
</section>

@endsection
