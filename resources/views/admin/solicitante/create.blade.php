@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Nuevo Solicitante</h1>
        </div>
    </div>
    </div>
</section>
<!-- /Content Header (Page header) -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <createsolicitante-component token="{{csrf_token()}}"></createsolicitante-component>
      </div>
    </div>
  </div>
</section>

@endsection
