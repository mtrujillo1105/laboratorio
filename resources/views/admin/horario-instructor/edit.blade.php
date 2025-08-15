@extends('layouts.admin2')

@section('content')
<!--grid-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Horario del Instructor</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!---->
    <section class="content">
        <div class="grid-hor">

            {!!Form::model($horarioinstructor, ['route'=>['horario-instructor.update', $horarioinstructor->id_horario_instructor],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}

                <div class="form-group">
                    {!!Form::label('nombre','Nombre del Instructor')!!}
                    {!!Form::text('nombre', $horarioinstructor->nombre_instructor,['class'=>'form-control','id'=>'nombre'])!!}
                </div>

                <div class="form-group">
                    {!!Form::label('fecha_inicial','Fecha de Inicial')!!}
                    {!!Form::date('fecha_inicial', $horarioinstructor->fecha_inicial,['class'=>'form-control','id'=>'fecha_inicial'])!!}
                </div>

                <div class="form-group">
                {!!Form::label('hora_in','Hora Inicial')!!}
                    {!!Form::text('hora_in', $horarioinstructor->hora_inicial,['class'=>'form-control','id'=>'hora_in'])!!}
                </div>

                <div class="form-group">
                {!!Form::label('hora_fi','Hora Final')!!}
                    {!!Form::text('hora_fi', $horarioinstructor->hora_final,['class'=>'form-control','id'=>'hora_fi'])!!}
                </div>

            {!!Form::submit('Editar',['class'=>'btn btn-success'])!!}
            <a class="btn btn-danger" href="{{ route('horario-instructor.index') }}">Cancelar</a>

            {!!Form::close()!!}
        </div>
    </section>
</div>
@endsection