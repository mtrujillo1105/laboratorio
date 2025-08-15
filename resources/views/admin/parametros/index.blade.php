@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Configuracion del sistema</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <parametros-component></parametros-component>
    </section>


@endsection
