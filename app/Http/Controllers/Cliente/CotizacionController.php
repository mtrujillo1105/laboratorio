<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\UploadController as FileManager;
use App\TipoSolicitante;
use App\Ensayo;
use App\Solicitante;
use App\Contacto;
use App\Cotizacion;
use App\CotizacionDetalle;
use App\Prueba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;

class CotizacionController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        // Guardamos la tabla "solicitante"
        $solicitante = new Solicitante();
        $solicitante->TIPSOLIP_Codigo = $request->solicitante['TIPSOLIP_Codigo'];
        $solicitante->UBIGP_Codigo = $request->solicitante['UBIGP_Codigo'];
        $solicitante->SOLIC_Nombre = $request->solicitante['SOLIC_Nombre'];
        $solicitante->SOLIC_Ruc = $request->solicitante['SOLIC_Ruc'];
        $solicitante->SOLIC_Direccion = $request->solicitante['SOLIC_Direccion'];
        $solicitante->SOLIC_Telefono = $request->solicitante['SOLIC_Telefono'];
        $solicitante->SOLIC_Email = $request->solicitante['SOLIC_Email'];
        $solicitante->SOLIC_FlagEstado = '1';
        $solicitante->save();

        // // Enlace de la tabla 'solicitante' con la tabla 'contacto'
        $contacto = $solicitante->contacto()->create([
            'nombre_contacto' => $request->contacto['nombre_contacto'],
            'correo_contacto' => $request->contacto['correo_contacto'],
            'celular_contacto' => $request->contacto['celular_contacto']
        ]);

        // // Enlace de la tabla 'contacto' con la tabla 'cotizacion'
        $cotizacion = $contacto->cotizacion()->create([
            'TIPOCOP_Codigo' => '1',
            'COTIC_Correo2' => $request->cotizacion['COTIC_Correo1'],
            'COTIC_Correo3' => $request->cotizacion['COTIC_Correo2'],
            'COTIC_Correo4' => $request->cotizacion['COTIC_Correo3'],
            'COTIC_Correo1' => $request->cotizacion['COTIC_Correo4'],
            'COTIC_Fecha_Cotizacion' => $request->cotizacion['COTIC_Fecha_Cotizacion']
        ]);

        //Grabamos equipos
        if (isset($request->equipos)) {
            if (count($request->equipos) > 0) {
                foreach ($request->equipos as $value) {
                    $file_result_equipo = null;
                    if (isset($value["tempFile"]) && $value["tempFile"] != null && $value["tempFile"] != "null")
                        $file_result_equipo = FileManager::saveFile($value["tempFile"], "W");

                    $equipo = CotizacionDetalle::create([
                        'COTIP_Codigo'                              => $cotizacion->COTIP_Codigo,
                        "CODEC_Nombre_Equipo"                       => $value["CODEC_Nombre_Equipo"],
                        "CODEC_Descripcion_Equipo"                  => $value["CODEC_Descripcion_Equipo"],
                        "CODEC_Fabricante_Equipo"                   => $value["CODEC_Fabricante_Equipo"],
                        "CODEC_Cantidad"                            => $value["CODEC_Cantidad"],
                        "CODEC_Descripcion_Ficha_Tecnica_Equipo"    => $value["CODEC_Descripcion_Ficha_Tecnica_Equipo"],
                        "CODEC_Url_Ficha_Tecnica_Equipo"            => $value["CODEC_Url_Ficha_Tecnica_Equipo"],
                        // "CODEC_Archivo_Descripcion_Equipo"          => $value["CODEC_Archivo_Descripcion_Equipo"],
                        "CODEC_Archivo_Descripcion_Equipo"          => (isset($value["tempFile"]) && $value["tempFile"] != null && $value["tempFile"] != "null") ? $file_result_equipo->getPath() : null,
                        "CODEC_Costo"                               => '0.00',
                        "CODEC_SubTotal"                            => '0.00'
                    ]);
                    $pruebas = $value["pruebas"];
                    //Grabamos las pruebas
                    if (isset($pruebas) && count($pruebas) > 0) {
                        foreach ($pruebas as $value2) {
                            $file_result_prueba = null;
                            if (isset($value2["tempFile"]) && $value2["tempFile"] != null && $value2["tempFile"] != "null")
                                $file_result_prueba = FileManager::saveFile($value2["tempFile"], "W");

                            $prueba = Prueba::create([
                                "CODEP_Codigo"       => $equipo->CODEP_Codigo,
                                "Descripcion_Prueba" => $value2["Descripcion_Prueba"],
                                "Descripcion_Norma"  => $value2["Descripcion_Norma"],
                                "Norma_Asoc_Prueba"  => $value2["Norma_Asoc_Prueba"],
                                "Costo"              => $value2["Costo"],
                                "Arch_Norma_Tecnica" => (isset($value2["tempFile"]) && $value2["tempFile"] != null && $value2["tempFile"] != "null") ? $file_result_prueba->getPath() : null,
                                // "Arch_Norma_Tecnica" => $value2["Arch_Norma_Tecnica"]
                            ]);
                        }
                    }
                }
            }
        }
        return response()->json(['¡La cotización se guardó correctamente!']);
    }

    public function edit($id)
    {
    }

    public function destroy($id)
    {
    }
}
