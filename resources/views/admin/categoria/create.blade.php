@extends('layouts.admin')

@section('content')
<!--banner-->	
<div class="banner">
   <h2>
        <a href="index.html">Categorias</a>
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
            <h3 id="grid-example-basic">Nueva Categoria</h3></div>
        <!----> 
        <div class="grid-hor">
            {!!Form::open(['route'=>'categoria.store','method'=>'POST','class'=>'col-sm-10'])!!}
                <div class="form-group">
                    {!!Form::label('nombre','Nombre:')!!}
                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre','id'=>'nombre'])!!}
                </div>
                {!!Form::submit('Grabar',['class'=>'btn btn-success'])!!}
            {!!Form::close()!!}
        </div>
    </div>
</div>
@endsection