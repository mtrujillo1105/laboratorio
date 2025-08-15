@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Listado de Serivicos Academicos</h1>
      </div>
      <div class="col-sm-6 text-right">
        <!-- actualizado por marck, usando ELOQUENT -->
        <a class="btn btn-info" href="{{ route('servicioac.create') }}">Agregar Servicio Academico</a>
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
          <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr class="text-center">
              <th scope="col">Codigo</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Costo</th>
              <th scope="col" colspan="2" class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
              @forelse($service as $item=>$prod)
              <tr class="text-center">
                <!--actualizado por marck -->
                <th scope="row">{{$item+1}}</th>
                <td class="text-left">{{$prod->SERVICIOAC_Nombre}}</td>
                <td class="text-left">{{$prod->SERVICIOAC_Descripcion}}</td>
                <td class="text-right">{{$prod->SERVICIOAC_Costo}}</td>
                <td><button class="btn btn-info">
                  <a class="text-light" href="{{ route('servicioac.edit', $prod->id) }}">
                    Editar
                  </a></button></td>
                <td>
                  <!-- $prod-> (debe señalar al "ID") - fijado por marck -->
                  {!!Form::open(['route'=>['servicioac.destroy',$prod->id],'method'=>'DELETE'])!!}
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
                <!-- -------------------- -->
            </tbody>
          </table>
          {{ $service->links() }}
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
