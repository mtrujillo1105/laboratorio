@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Cursos que enseñaran los Instructores</h1>
      </div>
      <div class="col-sm-6 text-right">
        <!-- actualizado por marck, usando ELOQUENT -->
        <a class="btn btn-info" href="{{ route('instructor-curso.create') }}">Agregar Curso a Instructor</a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main Content-->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th scope="col">Codigo</th>
              <th scope="col">Nombre del Curso</th>
              <th scope="col">Nombre del Instructor</th>
              <th scope="col" colspan="2" class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
              @forelse($cursoinstructors as $item=>$cursoinstructor)
                <tr>
                  <!--actualizado por marck -->
                  <th scope="row">{{$item+1}}</th>
                  <td>{{$cursoinstructor->CURSOC_Nombre}}</td>
                  <td>{{$cursoinstructor->nombre}}</td>
                  <td><button class="btn btn-info">
                    <a class="text-light" href="{{ route('instructor-curso.edit', $cursoinstructor->id_curso_instructor) }}">
                      Editar
                    </a></button></td>
                  <td>
                    <!--- fijado por marck -->
                    {!!Form::open(['route'=>['instructor-curso.destroy',$cursoinstructor->id_curso_instructor],'method'=>'DELETE'])!!}
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        {!!Form::submit('Eliminar',
                              ['class'=>'btn btn-danger'])
                        !!}
                    {!!Form::close()!!}
                    </td>
                </tr>
              @empty
                <p><i>No se han encontrado elementos en la base de datos ...</i></p>
              @endforelse
    <!-- Termina listado -->
            </tbody>
          </table>
          
 
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

@endsection