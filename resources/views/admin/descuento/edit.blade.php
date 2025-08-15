@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Editar Descuento</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
<div class="grid-hor">
    <descuento-component token="{{csrf_token()}}" :tipo=1 :id={{$curso->id_curso}}></descuento-component>
</div>
</section>

@endsection
