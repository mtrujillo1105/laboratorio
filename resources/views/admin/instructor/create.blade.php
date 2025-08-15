@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Nuevo Instructor</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="grid-hor">
      {!!Form::open(['route'=>'instructor.store','method'=>'POST','class'=>'col-sm-10'])!!}
          <div class="form-group">
              {!!Form::label('nombre','Nombre')!!}
              {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre ...','id'=>'nombre'])!!}
          </div>
          <div class="form-group">
              {!!Form::label('celular','Celular')!!}
              {!!Form::text('celular',null,['class'=>'form-control','placeholder'=>'Ingrese el celular ...','id'=>'celular'])!!}
          </div>
          <div class="form-group">
          {!!Form::label('email','Email')!!}
              {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese el email ...','id'=>'email'])!!}
          </div>
          {!!Form::submit('Agregar',['class'=>'btn btn-info'])!!}
          <!-- Agregar boton de cancelar -->
          <a class="btn btn-danger" href="{{ route('instructor.index') }}">Cancelar</a>
      {!!Form::close()!!}

  </div>
</section>

@endsection