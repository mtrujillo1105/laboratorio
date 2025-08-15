@extends('layouts.admin')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listado de Cursos</h1>
        </div>
        <div class="col-sm-6 text-right">
          <a class="btn btn-info" href="{{ route('curso.create') }}">Agregar Curso</a>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
      <indexcurso-component> </indexcurso-component>
  </section>

@endsection
