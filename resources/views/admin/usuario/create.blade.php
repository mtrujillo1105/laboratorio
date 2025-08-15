@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Nuevo Usuario</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<!---->
<section class="content">
    <div class="grid-hor">
        {!!Form::open(['route'=>'usuario.store','method'=>'POST','class'=>'col-sm-10'])!!}
            <div class="form-group">
                {!!Form::label('nombres','Nombres')!!}
                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre','id'=>'nombre'])!!}
                @error('nombre')
                <small class="text-danger">Escribir el nombre del nuevo usuario</small>
                @enderror
            </div>
            <div class="form-group">
                {!!Form::label('email','Correo electronico')!!}
                {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','id'=>'email'])!!}
                @error('email')
                <small class="text-danger">Escribir email</small>
                @enderror
            </div>
            <div class="form-group">
                {!!Form::label('rol','Rol')!!}
                {!!Form::select('rol', $rol, 'null', ['class' => 'form-control', 'placeholder'=>'Seleccionar Rol','id'=>'rol']) !!}

                @error('rol')
                <small class="text-danger">Escribir rol</small>
                @enderror
            </div>
            <div class="form-group">
                {!!Form::label('password','Ingrese la contraseña')!!}
                {!!Form::password('password',['class'=>'form-control mb-2','placeholder'=>'Ingrese la contraseña','id'=>'password'])!!}
                @error('password')
                <small class="text-danger">Falta escribir el password</small>
                @enderror
                {!!Form::password('re_password',['class'=>'form-control','placeholder'=>'Reingrese la contraseña','id'=>'re_password'])!!}
                @error('re_password')
                <small class="text-danger">Falta escribir el password</small>
                @enderror
                @error('passwordNotEquals')
                <small class="text-danger">Las contraseñas no son iguales</small>
                @enderror
            </div>
                {!!Form::submit('Agregar',['class'=>'btn btn-info'])!!}
            <!-- Agregar boton de cancelar -->
            <a class="btn btn-danger" href="{{ route('usuario.index') }}">Cancelar</a>
        {!!Form::close()!!}
    </div>
</section>

@endsection
