@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Editar Servicio Academico</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="grid-hor">
      {!!Form::model($servicio, ['route'=>['servicioac.update', $servicio->id],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}
          <div class="form-group">
              {!!Form::label('nombre','Nombre')!!}
              {!!Form::text('nombre', $servicio->SERVICIOAC_Nombre,['class'=>'form-control','id'=>'nombre'])!!}
          </div>
          <div class="form-group">
              {!!Form::label('descripcion','Descripcion')!!}
              {!!Form::textarea('descripcion', $servicio->SERVICIOAC_Descripcion,['class'=>'form-control','id'=>'descripcion'])!!}
          </div>
          <div class="form-group">
          {!!Form::label('costo','Costo')!!}
              {!!Form::text('costo', $servicio->SERVICIOAC_Costo,['class'=>'form-control','id'=>'costo'])!!}
          </div>
      {!!Form::submit('Editar',['class'=>'btn btn-info'])!!}
      <a class="btn btn-danger" href="{{ route('servicioac.index') }}">Cancelar</a>
      {!!Form::close()!!}
  </div>
</section>

@endsection