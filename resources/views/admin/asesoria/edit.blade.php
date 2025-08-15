@extends('layouts.admin')

@section('content')
<!--grid-->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Asesoria</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!---->
    <section class="content">
        <div class="grid-hor">

            {!!Form::model($asesorialabs, ['route'=>['asesoria.update', $asesorialabs->id_asesoria],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}

                <div class="form-group">
                    {!!Form::label('nombre','Nombre')!!}
                    {!!Form::text('nombre', $asesorialabs->ASESORIA_Nombre,['class'=>'form-control','id'=>'nombre'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('descripcion','Descripcion')!!}
                    {!!Form::textarea('descripcion', $asesorialabs->ASESORIA_Descripcion,['class'=>'form-control','id'=>'descripcion'])!!}
                </div>
                

            {!!Form::submit('Editar',['class'=>'btn btn-success'])!!}
            <a class="btn btn-danger" href="{{ route('asesoria.index') }}">Cancelar</a>

            {!!Form::close()!!}
        </div>
    </section>

@endsection