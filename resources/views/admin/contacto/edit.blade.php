@extends('layouts.admin')

@section('content')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Editar Contacto</h1>
        </div>
    </div>
    </div>
</section>
<!-- /Content Header -->

<!-- Main Content-->
<section class="content">
    <editcontacto-component codigo = "{{$contacto->id_contacto}}" token="{{csrf_token()}}"></editcontacto-component>
</section>
<!-- /Main Content-->

@endsection