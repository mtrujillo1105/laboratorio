@extends('layouts.admin')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-8">
        <h1>Busqueda de cotizaciones pasadas</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <busqueda-component token="{{csrf_token()}}" :user="{{ json_encode(Auth::user()) }}"></busqueda-component>
</section>

@endsection
