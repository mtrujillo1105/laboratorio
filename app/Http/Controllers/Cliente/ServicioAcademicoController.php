<?php

namespace App\Http\Controllers\Cliente;
use App\Http\Controllers\Controller;
use App\ServicioAcademico;
use Illuminate\Http\Request;
use Redirect;

class ServicioAcademicoController extends Controller
{
    public function store(Request $request)
    {
        ServicioAcademico::create([
            'Universidad_Procedencia' => request('nombre'),
            'Nombre_Contacto' => request('nombre_contact'),
            'Correo_Electrónico_Contacto' => request('email'),
            'Celular_Contacto' => request('celular'),
            'Tipo_Servicio_Academico' => request('servicio'),
            'Descripcion_Servicio_Solicitado' => request('comment'),
        ]);

        return Redirect::to("/academico");
    }
}
