<?php

namespace App\Http\Controllers\Admin;

use App\Contacto;
use App\Cotizacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CotizacionDetalle;
use App\Http\Controllers\Cliente\UbigeoController;
use App\Prueba;
use App\Solicitante;

abstract class TipoBusqueda
{
    const Ensayo = 1;
    const Calibracion = 2;
    const Capacitacion = 3;
}

class CotizacionDetalleController extends Controller
{
    public function index()
    {
    }

    public function busqueda_cotizaciones_pasadas(Request $request)
    {
        $cotizacion = [];
        if (!isset($request->tipoBusqueda) || $request->tipoBusqueda == null || $request->tipoBusqueda == '') {

            return response()->json($cotizacion);
        }

        switch ($request->tipoBusqueda) {
            case TipoBusqueda::Ensayo:
            case TipoBusqueda::Calibracion:

                $cotizacion_db = Cotizacion::join('contacto', 'contacto.id_contacto', 'cotizacion.id_contacto')
                    ->join('solicitante', 'solicitante.SOLIP_Codigo', '=', 'contacto.SOLIP_Codigo')
                    ->leftJoin('cotizacion_detalle', 'cotizacion.COTIP_Codigo', 'cotizacion_detalle.COTIP_Codigo')
                    ->leftJoin('prueba_equipo', 'cotizacion_detalle.CODEP_Codigo', 'prueba_equipo.CODEP_Codigo')
                    ->where('cotizacion.TIPOCOP_Codigo', $request->tipoBusqueda);

                if ($request->nombreSolicitante != null || $request->nombreSolicitante == '') {
                    $cotizacion_db = $cotizacion_db
                        ->where('solicitante.SOLIC_NOmbre', 'LIKE', "%$request->nombreSolicitante%");
                }

                if ($request->nombreEquipo) {
                    $cotizacion_db = $cotizacion_db
                        ->where('cotizacion_detalle.CODEC_Nombre_Equipo', 'LIKE', "%$request->nombreEquipo%");
                }

                if ($request->nombreEnsayo) {
                    $cotizacion_db = $cotizacion_db
                        ->where('prueba_equipo.Descripcion_Prueba', 'LIKE', "%$request->nombreEnsayo%");
                }

                $cotizacion_db = $cotizacion_db->select(
                    'cotizacion.COTIC_Total as total',
                    'cotizacion.COTIP_Codigo as codigoCotizacion',
                    'solicitante.SOLIC_Nombre as nombreSolicitante',
                    'cotizacion_detalle.CODEC_Nombre_Equipo as nombreEquipo',
                    'prueba_equipo.Descripcion_Prueba as nombrePrueba'
                )->get();

                $cotizacion = $cotizacion_db;

                break;
            case TipoBusqueda::Capacitacion:
                # code...
                break;
            default:
                # code...
                break;
        }

        // $cotizaciones =
        return response()->json($cotizacion);
    }

    public function retornar_cotizacion_by_id($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        $contacto = Contacto::findOrFail($cotizacion->id_contacto);
        $solicitantes = Solicitante::join('ubigeo', 'solicitante.UBIGP_Codigo', '=', 'ubigeo.UBIGP_Codigo')
            ->leftJoin('tiposolicitante', 'tiposolicitante.TIPSOLIP_Codigo', 'solicitante.TIPSOLIP_Codigo')
            ->findOrFail($contacto->SOLIP_Codigo);

        $departamento = UbigeoController::listDepartamentos()
            ->where('UBIGC_CodDpto', $solicitantes['UBIGC_CodDpto'])
            ->first()->UBIGC_Descripcion;

        $provincia = UbigeoController::listProvincias($solicitantes['UBIGC_CodDpto'])
            ->where('UBIGC_CodProv', $solicitantes['UBIGC_CodProv'])
            ->first()->UBIGC_Descripcion;

        $distrito = UbigeoController::listDistritos($solicitantes['UBIGC_CodDpto'], $solicitantes['UBIGC_CodProv'])
        ->where('UBIGC_CodDist', $solicitantes['UBIGC_CodDist'])
        ->first()->UBIGC_Descripcion;

        $solicitantes['departamento'] = $departamento;
        $solicitantes['provincia'] = $provincia;
        $solicitantes['distrito'] = $distrito;

        return response()->json([
            'cotizacion' => $cotizacion,
            'contacto' => $contacto,
            'solicitante' => $solicitantes
        ]);
    }

    public function list($id)
    {
        $equipos = CotizacionDetalle::where(
            ["COTIP_Codigo" => $id]
        )
            ->orderBy("CODEP_Codigo")
            ->get();
        $objeto = array();
        foreach ($equipos as $value) {
            $equipo = $value;
            // $equipo->pruebas = CotizacionDetalle::find($value->CODEP_Codigo)->pruebas;
            $pruebas = Prueba::where('CODEP_Codigo', $value->CODEP_Codigo)->get();

            $pruebas_object = array();
            foreach ($pruebas as $value2) {
                $prueba = $value2;

                if (file_exists($value2->Arch_Norma_Tecnica)) {
                    $prueba->nombre_archivo = basename($value2->Arch_Norma_Tecnica);
                } else if (file_exists($_SERVER['DOCUMENT_ROOT'] . $value2->Arch_Norma_Tecnica)) {
                    $prueba->nombre_archivo = basename($_SERVER['DOCUMENT_ROOT'] . $value2->Arch_Norma_Tecnica);
                } else {
                    $prueba->nombre_archivo = null;
                }
                array_push($pruebas_object, $prueba);
            }

            $equipo->pruebas = $pruebas_object;

            if (file_exists($value->CODEC_Archivo_Descripcion_Equipo)) {
                $equipo->nombre_archivo = basename($value->CODEC_Archivo_Descripcion_Equipo);
            } else if (file_exists($_SERVER['DOCUMENT_ROOT'] . $value->CODEC_Archivo_Descripcion_Equipo)) {
                $equipo->nombre_archivo = basename($_SERVER['DOCUMENT_ROOT'] . $value->CODEC_Archivo_Descripcion_Equipo);
            } else {
                $equipo->nombre_archivo = null;
            }

            array_push($objeto, $equipo);
        }

        return $objeto;
    }

    public function delete($id)
    {
        Prueba::where('CODEP_Codigo', $id)->delete();
        $result = CotizacionDetalle::where('CODEP_Codigo', $id)->delete();
        if ($result) {
            return response()->json(['message' => 'Equipo y pruebas borrado']);
        } else {
            return response()->json(['message' => 'Ocurrio un error']);
        }
    }

    public function destroy($id)
    {
        CotizacionDetalle::destroy($id);
        return response()->json(['message' => 'Cotizaciondetalle borrado']);
    }

    public function destroyById($id)
    {
        CotizacionDetalle::where('COTIP_Codigo', $id)->firstorfail()->delete();
        return response()->json(['message' => 'Cotizaciondetalle borrado']);
    }
}
