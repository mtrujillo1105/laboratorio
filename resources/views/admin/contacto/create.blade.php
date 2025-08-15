@extends('layouts.admin')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Nuevo Contacto</h1>
      </div>
    </div>
  </div>
</section>
<!--Content Header -->

<!-- Main Content-->
<section class="content">
    <createcontacto-component token="{{csrf_token()}}"></createcontacto-component>
</section>
<!-- /Main Content-->

@endsection