@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Editar Solicitante</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<!---->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <editsolicitante-component codigo="{{$solicitante->SOLIP_Codigo}}" token="{{csrf_token()}}"></editsolicitante-component>
      </div>
    </div>
  </div>
</section>

@endsection
