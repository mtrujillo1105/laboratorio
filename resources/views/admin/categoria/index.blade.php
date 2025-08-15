@extends('layouts.admin')

@section('content')
<!--banner-->	
<div class="banner">
   <h2>
        <a href="index.html">Categoria</a>
        <i class="fa fa-angle-right"></i>
        <span>Listar</span>
    </h2>
</div>
<!--//banner-->

<!--grid-->
<div class="grid-system">
    <!---->
    <div class="horz-grid">
        <div class="grid-hor">
            <h3 id="grid-example-basic" class="col-sm-8">Listado de categorias</h3>
            <div class="col-sm-4 text-right">
                <a class="btn btn-info" href="{{ url('/categoria/create') }}">Agregar Categoria</a>    
            </div>
        </div>
        <!----> 
        <div class="grid-hor">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Codigo</th>
                  <th scope="col">Nombre</th>
                  <th scope="col" colspan="2" class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categorias as $item=>$categ)
                <tr>
                  <th scope="row">{{$item+1}}</th>
                  <td>{{$categ->nombre}}</td>
                  <td>{!!link_to_route('categoria.edit', $title = 'Editar', $parameters = $categ->id, $attributes = ['class'=>'btn btn-success'])!!}</td>
                  <td>
                    <form action="/categoria/{{ $categ->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">Eliminar</button>
                    </form>
                   </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
