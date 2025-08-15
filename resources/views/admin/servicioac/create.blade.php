@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Nuevo Servicio Academico</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
    
<section class="content">
  <div class="grid-hor">
      {!!Form::open(['route'=>'servicioac.store','method'=>'POST','class'=>'col-sm-10'])!!}
        <div class="form-group">
            {!!Form::label('nombre','Nombre')!!}
            {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre','id'=>'nombre'])!!}
            @error('nombre')
            <small class="text-danger">Escribir el nombre del servicio academico</small>    
            @enderror 
        </div>
        <div class="form-group">
            {!!Form::label('descripcion','Descripcion')!!}
            {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','id'=>'descripcion'])!!}
            @error('descripcion')
            <small class="text-danger">Escribir la descripcion</small>    
            @enderror 
        </div>
        <div class="form-group">
            {!!Form::label('costo','Costo')!!}
            {!!Form::text('costo',null,['class'=>'form-control','placeholder'=>'Ingrese el costo','id'=>'costo'])!!}
            @error('costo')
            <small class="text-danger">Ingresar el costo</small>    
            @enderror
        </div>
            {!!Form::submit('Agregar',['class'=>'btn btn-info'])!!}
        <!-- Agregar boton de cancelar -->
        <a class="btn btn-danger" href="{{ route('servicioac.index') }}">Cancelar</a>
      {!!Form::close()!!}

  </div>
</section>

@endsection