@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row titulo-vista">
			<h5>Editar Cotización de Capacitación - {{ $cotizacion->COTIP_Codigo}}</h5>
		</div>
	</div>
</section>

<!-- Main Content-->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<editcotizacioncapacitacion-component
                    codigo="{{$cotizacion->COTIP_Codigo}}"
                    token="{{csrf_token()}}"
                    :user="{{ json_encode(Auth::user()) }}"></editcotizacioncapacitacion-component>
			</div>
		</div>
	</div>
</section>
<!-- Main Content-->

@endsection
