@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Horario del Instructor</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
<div class="grid-hor">
    {!!Form::open(['route'=>'horario-instructor.store','method'=>'POST','class'=>'col-sm-10'])!!}
        <div class="form-group col-md-6">
            {!!Form::label('nombre','Nombre del Instructor')!!}
            {!!Form::select('nombre', $instructors, 'null', ['class' => 'form-control', 'placeholder'=>'-Seleccionar Instructor-','id'=>'nombre']) !!}
            @error('nombre')
            <small class="text-danger">Seleccionar el Instructor</small>
            @enderror
        </div>
        <div class="container">
            <div class="row">
                <div class="form-group col-md-3">
                    {!!Form::label('fecha_inicial','Fecha de Inicio')!!}
                    {!!Form::date('fecha_inicial',"null",['class'=>'form-control','id'=>'fecha_inicial'])!!}
                    @error('fecha_inicial')
                    <small class="text-danger">Seleccionar la fecha de inicio</small>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    {!!Form::label('fecha_final','Fecha de Termino')!!}
                    {!!Form::date('fecha_final',"null",['class'=>'form-control','id'=>'fecha_final'])!!}
                    @error('fecha_final')
                    <small class="text-danger">Seleccionar la fecha de termino</small>
                    @enderror
                </div>
            </div>
        </div>



        <div class="container">
                <div class="row">
                    <div class="form-group col-md-2">	
                        <div class="form-group" style="padding: 2px;">	
                        {!!Form::checkbox('dia_lunes', "Lunes", false, ['class' => 'dias','id' => 'dia_lunes'])!!}	
                        {!!Form::label('dia_lunes','Lunes')!!}
                        </div>
                        <div class="form-group" style="padding: 2px;">	
                        {!!Form::checkbox('dia_martes', "Martes", false, ['class' => 'dias','id' => 'dia_martes'])!!}	
                        {!!Form::label('dia_martes','Martes')!!}	
                        </div>
                        <div class="form-group" style="padding: 2px;">
                        {!!Form::checkbox('dia_miercoles', "Miercoles", false, ['class' => 'dias','id' => 'dia_miercoles'])!!}	
                        {!!Form::label('dia_miercoles','Miércoles')!!}	
                        </div>
                        <div class="form-group" style="padding: 2px;">
                        {!!Form::checkbox('dia_jueves', "Jueves", false, ['class' => 'dias','id' => 'dia_jueves'])!!}	
                        {!!Form::label('dia_jueves','Jueves')!!}	
                        </div>
                        <div class="form-group" style="padding-bottom: 1px;">
                        {!!Form::checkbox('dia_viernes', "Viernes", false, ['class' => 'dias','id' => 'dia_viernes'])!!}	
                        {!!Form::label('dia_viernes','Viernes')!!}
                        </div>
                        <div class="form-group" style="padding-top: 2px;">
                        {!!Form::checkbox('dia_sabado', "Sabado", false, ['class' => 'dias','id' => 'dia_sabado'])!!}	
                        {!!Form::label('dia_sabado','Sábado')!!}
                        </div>
                        <div class="form-group" style="padding-top: 2px;">
                        {!!Form::checkbox('dia_domingo', "Domingo", false, ['class' => 'dias','id' => 'dia_domingo'])!!}	
                        {!!Form::label('dia_domingo','Domingo')!!}
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <div class="form-group">
                            {!! Form::label('hora_ini_lunes', 'Hora de Inicio :') !!}
                            {!! Form::time('hora_ini_lunes',null, ['class' => '','id'=>'hora_ini_lunes']) !!} 
                        </div>
                        <div class="form-group">
                            {!! Form::label('hora_ini_martes', 'Hora de Inicio :') !!}
                            {!! Form::time('hora_ini_martes',null, ['class' => '','id'=>'hora_ini_martes']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('hora_ini_miercoles', 'Hora de Inicio :') !!}
                            {!! Form::time('hora_ini_miercoles',null, ['class' => '','id'=>'hora_ini_miercoles']) !!} 
                        </div> 
                        <div class="form-group">
                            {!! Form::label('hora_ini_jueves', 'Hora de Inicio :') !!}
                            {!! Form::time('hora_ini_jueves',null, ['class' => '','id'=>'hora_ini_jueves']) !!} 
                        </div>
                        <div class="form-group">
                            {!! Form::label('hora_ini_viernes', 'Hora de Inicio :') !!}
                            {!! Form::time('hora_ini_viernes',null, ['class' => '','id'=>'hora_ini_viernes']) !!} 
                        </div>
                        <div class="form-group">
                            {!! Form::label('hora_ini_sabado', 'Hora de Inicio :') !!}
                            {!! Form::time('hora_ini_sabado',null, ['class' => '','id'=>'hora_ini_sabado']) !!} 
                        </div>
                        <div class="form-group">
                            {!! Form::label('hora_ini_domingo', 'Hora de Inicio :') !!}
                            {!! Form::time('hora_ini_domingo',null, ['class' => '','id'=>'hora_ini_domingo']) !!} 
                        </div>                           
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            {!! Form::label('hora_fi_lunes', 'Hora Final :') !!}
                            {!! Form::time('hora_fi_lunes',null, ['class' => '','id'=>'hora_fi_lunes']) !!} 
                        </div>
                        <div class="form-group">
                            {!! Form::label('hora_fi_martes', 'Hora Final :') !!}
                            {!! Form::time('hora_fi_martes',null, ['class' => '','id'=>'hora_fi_martes']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('hora_fi_miercoles', 'Hora Final :') !!}
                            {!! Form::time('hora_fi_miercoles',null, ['class' => '','id'=>'hora_fi_miercoles']) !!} 
                        </div> 
                        <div class="form-group">
                            {!! Form::label('hora_fi_jueves', 'Hora Final :') !!}
                            {!! Form::time('hora_fi_jueves',null, ['class' => '','id'=>'hora_fi_jueves']) !!} 
                        </div>
                        <div class="form-group">
                            {!! Form::label('hora_fi_viernes', 'Hora Final :') !!}
                            {!! Form::time('hora_fi_viernes',null, ['class' => '','id'=>'hora_fi_viernes']) !!} 
                        </div>
                        <div class="form-group">
                            {!! Form::label('hora_fi_sabado', 'Hora Final :') !!}
                            {!! Form::time('hora_fi_sabado',null, ['class' => '','id'=>'hora_fi_sabado']) !!} 
                        </div>
                        <div class="form-group">
                            {!! Form::label('hora_fi_domingo', 'Hora Final :') !!}
                            {!! Form::time('hora_fi_domingo',null, ['class' => '','id'=>'hora_fi_domingo']) !!} 
                        </div>                           
                    </div>
                </div>
            </div>





    {!!Form::submit('Agregar',['class'=>'btn btn-info'])!!}
        <!-- Agregar boton de cancelar -->
        <a class="btn btn-danger" href="{{ route('horario-instructor.index') }}">Cancelar</a>
    {!!Form::close()!!}

</div>
</section>

@endsection