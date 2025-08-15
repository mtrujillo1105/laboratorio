@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Listado de Instructores</h1>
      </div>
      <div class="col-sm-6 text-right">
        <!-- actualizado por marck, usando ELOQUENT -->
        <a class="btn btn-info" href="{{ route('instructor.create') }}">Agregar Instructor</a>
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
            <tr class="text-center">
              <th scope="col">Codigo</th>
              <th scope="col">Nombre</th>
              <th scope="col">Celular</th>
              <th scope="col">Email</th>
              <th scope="col" colspan="2" class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
    <!-- Empieza listado de instructores -->
              @forelse($instructors as $item=>$instructor)
                <tr class="text-center">
                  <!--actualizado por marck -->
                  <th scope="row">{{$item+1}}</th>
                  <td class="text-left">{{$instructor->nombre}}</td>
                  <td>{{$instructor->celular}}</td>
                  <td>{{$instructor->email}}</td>
                  <td><button class="btn btn-info">
                    <a class="text-light" href="{{ route('instructor.edit', $instructor->INSTP_Codigo) }}">
                      Editar
                    </a></button></td>
                  <td>
                    <!-- $prod-> (debe señalar al "ID") - fijado por marck -->
                    {!!Form::open(['route'=>['instructor.destroy',$instructor->INSTP_Codigo],'method'=>'DELETE'])!!}
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

          {{ $instructors->links() }}
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