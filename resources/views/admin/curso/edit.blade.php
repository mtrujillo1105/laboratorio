@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Editar Curso</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <curso-component token="{{csrf_token()}}" :tipo=1 :id={{$curso->id_curso}}></curso-component>
            </div>
        </div>
    </div>
  {{--  <div class="grid-hor">

      {!!Form::model($curso, ['route'=>['curso.update', $curso->id_curso],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}

          <div class="form-group">
              {!!Form::label('nombre','Nombre')!!}
              {!!Form::text('nombre', $curso->CURSOC_Nombre,['class'=>'form-control','id'=>'nombre'])!!}
          </div>
          <div class="form-group">
              {!!Form::label('descripcion','Descripcion')!!}
              {!!Form::textarea('descripcion', $curso->CURSOC_Descripcion,['class'=>'form-control','id'=>'descripcion'])!!}
          </div>
          <div class="form-group">
          {!!Form::label('costo','Costo')!!}
              {!!Form::text('costo', $curso->CURSOC_Costo,['class'=>'form-control','id'=>'costo'])!!}
          </div>

      {!!Form::submit('Editar',['class'=>'btn btn-info'])!!}
      <a class="btn btn-danger" href="{{ route('curso.index') }}">Cancelar</a>

      {!!Form::close()!!}
  </div>  --}}
</section>

@endsection
