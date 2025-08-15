@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Editar Instructor</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="grid-hor">

      {!!Form::model($instructor, ['route'=>['instructor.update', $instructor->INSTP_Codigo],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}

          <div class="form-group">
              {!!Form::label('nombre','Nombre')!!}
              {!!Form::text('nombre', $instructor->nombre,['class'=>'form-control','id'=>'nombre'])!!}
          </div>
          <div class="form-group">
              {!!Form::label('celular','Celular')!!}
              {!!Form::text('celular', $instructor->celular,['class'=>'form-control','id'=>'celular'])!!}
          </div>
          <div class="form-group">
          {!!Form::label('email','Email')!!}
              {!!Form::text('email', $instructor->email,['class'=>'form-control','id'=>'email'])!!}
          </div>

      {!!Form::submit('Editar',['class'=>'btn btn-info'])!!}
      <a class="btn btn-danger" href="{{ route('instructor.index') }}">Cancelar</a>

      {!!Form::close()!!}
  </div>
</section>

@endsection