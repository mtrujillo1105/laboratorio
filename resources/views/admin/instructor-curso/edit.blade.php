@extends('layouts.admin2')

@section('content')
<!--grid-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Curso del Instructor</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!---->
    <section class="content">
        <div class="grid-hor">

            {!!Form::model($cursoinstructor, ['route'=>['instructor-curso.update', $cursoinstructor->id_curso_instructor],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}
            <div class="form-group col-md-6">
                {!!Form::label('nombre_instructor','Instructor')!!}
                {!!Form::select('nombre_instructor', $instructors, 'null', ['class' => 'form-control', 'placeholder'=>'-Seleccionar Instructor-','id'=>'nombre_instructor']) !!}
                @error('nombre_instructor')
                <small class="text-danger">Seleccionar el Instructor</small>
                @enderror
            </div>
            <div class="form-group col-md-6">
                    {!!Form::label('nombre_curso','Nombre del Curso')!!}
                    {!!Form::select('nombre_curso', $productos, 'null', ['class' => 'form-control', 'placeholder'=>'-Seleccionar Curso-','id'=>'nombre_curso']) !!}
                    @error('nombre_curso')
                    <small class="text-danger">Seleccionar el curso</small>
                    @enderror
            </div>



            {!!Form::submit('Editar',['class'=>'btn btn-success'])!!}
            <a class="btn btn-danger" href="{{ route('instructor-curso.index') }}">Cancelar</a>

            {!!Form::close()!!}
        </div>
    </section>
</div>
@endsection