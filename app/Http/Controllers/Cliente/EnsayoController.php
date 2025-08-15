<?php

namespace App\Http\Controllers\Cliente;
use App\Http\Controllers\Controller;

use App\Ensayo;
use App\Solicitante;
use App\Contacto;
use App\Cotizacion;
use App\TipoSolicitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response;

class EnsayoController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        // Guardamos la tabla "solicitante"
        $solicitante = new Solicitante();
        $solicitante->TIPSOLIP_Codigo = $request->SOLIC_id;
        $solicitante->SOLIC_Nombre = $request->SOLIC_Nombre;
        $solicitante->SOLIC_Ruc = $request->SOLIC_Ruc;
        $solicitante->SOLIC_Direccion = $request->SOLIC_Direccion;
        $solicitante->SOLIC_Telefono = $request->SOLIC_Telefono;
        $solicitante->SOLIC_Email = $request->SOLIC_Email;
        $solicitante->save();

        // Enlace de la tabla 'solicitante' con la tabla 'contacto'
        $contacto = $solicitante->contacto()->create([
            'nombre_contacto' => request('nombre_contacto'),
            'correo_contacto' => request('correo_contacto'),
            'celular_contacto' => request('celular_contacto'),
        ]);

        // Enlace de la tabla 'contacto' con la tabla 'cotizacion'
        $cotizacion = $contacto->cotizacion()->create([
            'TIPOCOP_Codigo' => '1',
            'COTIC_Correo2' => request('COTIC_Correo2'),
            'COTIC_Correo3' => request('COTIC_Correo3'),
            'COTIC_Correo4' => request('COTIC_Correo4'),
            'COTIC_Correo1' => request('COTIC_Correo1')
            // 'COTIC_Fecha_Cotizacion' => request('COTIC_Fecha_Cotizacion')
        ]);

        print_r($request->all());
        die();
        // Enlace de la tabla 'cotizacion_detalle' con la tabla 'cotizacion'
        /*
        $ensayo = $cotizacion->ensayo()->create([
            'CODEC_Nombre_Equipo' => request('CODEC_Nombre_Equipo'),
            'CODEC_Descripcion_Equipo' => request('CODEC_Descripcion_Equipo'),
            'CODEC_Fabricante_Equipo' => request('CODEC_Fabricante_Equipo'),
            'CODEC_Descripcion_Ficha_Tecnica_Equipo' => request('CODEC_Descripcion_Ficha_Tecnica_Equipo'),
            'CODEC_Url_Ficha_Tecnica_Equipo' => request('CODEC_Url_Ficha_Tecnica_Equipo'),
            'CODEC_Costo' => request('CODEC_Costo'),
            'CODEC_Archivo_Descripcion_Equipo' => request('CODEC_Archivo_Descripcion_Equipo'),
            'CODEC_Cantidad' => request('CODEC_Cantidad'),
        ]);
        */

        return redirect()->route('cot_ensayos');

    }

    public function edit($id)
    {

    }

    public function destroy($id)
    {

    }
}
