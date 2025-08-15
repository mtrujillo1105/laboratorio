<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\UploadController as FileManager;
use App\Cotizacion;
use App\CotizacionDetalle;
use App\User;
use App\Solicitante;
use App\TipoSolicitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;

class CalibracionController extends Controller
{
    public function index()
    {
        $cotizaciones = Cotizacion::orderBy('COTIC_Numero')->get();
        return view('admin.calibracion.index', compact('cotizaciones'));
    }

    public function list()
    {
        $calibraciones =
            Cotizacion::join('contacto', 'contacto.id_contacto', '=', 'cotizacion.id_contacto')
            ->join('solicitante', 'solicitante.SOLIP_Codigo', '=', 'contacto.SOLIP_Codigo')
            ->leftJoin('users', 'users.id', 'cotizacion.USUA_Codigo')
            ->select('cotizacion.*', 'solicitante.SOLIC_Nombre', 'contacto.*', 'users.name')
            ->where('cotizacion.TIPOCOP_Codigo', 2)
            ->get();

        return $calibraciones;
    }

    public function create()
    {
        // $solicitantes = Solicitante::all();
        // $usuarios     = User::all();
        // $cotizacion   = new Cotizacion();
        // return view("admin.calibracion.create", compact('solicitantes', 'usuarios', 'cotizacion'));
        return view("admin.calibracion.create");
    }

    public function store(Request $request)
    {
        $cot = Cotizacion::where('COTIC_Numero', $request->numero)
                ->first();
        if($cot !== null){
            return response()->json(['error'=>'¡El número de cotización ya se encuentra registrado!']);
        }
        //Grabamos la cabecera
        $objCotizacion = [
            'id_contacto'    => $request->contacto,
            'COTIC_Numero'   => $request->numero,
            'COTIC_Fecha_Cotizacion' => $request->fecha,
            'USUA_Codigo'    => $request->usuario,
            'COTIC_SubTotal' => $request->subtotal,
            'COTIC_Igv'      => $request->igv,
            'COTIC_Total'    => $request->total,
            'COTIC_Correo1'  => isset($request->correo1)?$request->correo1:"",
            'COTIC_Correo2'  => isset($request->correo2)?$request->correo2:"",
            'COTIC_Correo3'  => isset($request->correo3)?$request->correo3:"",
            'COTIC_Correo4'  => isset($request->correo4)?$request->correo4:"",
            'TIPOCOP_Codigo' => 2,
            'COTIC_dcto_subtotal'  => $request->subtotalDescuento,
            'COTIC_dcto_porcentaje'  => $request->descuentoPorcentaje,
            'COTIC_dcto_importe'  => $request->descuentoImporte,
            'COTIC_flag_pedido'      => $request->COTIC_flag_pedido
        ];
        $cot = Cotizacion::create($objCotizacion);

        if(isset($request->ubigeo)){
            //Actualizar el solicitante
            $solicitante = Solicitante
                            ::join('contacto', 'contacto.SOLIP_Codigo', 'solicitante.SOLIP_Codigo')
                            ->where('contacto.id_contacto', $request->contacto)
                            ->firstOrFail();
            $solicitante->UBIGP_Codigo = $request->ubigeo;
            $solicitante->save();
        }

        //Grabamos equipos
        if(isset($request->equipos)){
            if(count($request->equipos)>0){
                foreach($request->equipos as $item=>$value){
                    $archivo = $value["tempFile"];

                    $file_result_equipo = null;
                    if (isset($archivo) && $archivo != null && $archivo != "null")
                        $file_result_equipo = FileManager::saveFile($archivo, "I");

                    $equipo = CotizacionDetalle::create([
                        'COTIP_Codigo'             => $cot->COTIP_Codigo,
                        "CODEC_Nombre_Equipo"      => $value["CODEC_Nombre_Equipo"],
                        "CODEC_Descripcion_Equipo" => $value["CODEC_Descripcion_Equipo"],
                        "CODEC_Fabricante_Equipo"  => $value["CODEC_Fabricante_Equipo"],
                        "CODEC_Cantidad"           => $value["CODEC_Cantidad"],
                        "CODEC_Costo"              => $value["CODEC_Costo"],
                        "CODEC_SubTotal"           => $value["CODEC_Cantidad"]*$value["CODEC_Costo"],
                        "CODEC_Descripcion_Ficha_Tecnica_Equipo" => $value["CODEC_Descripcion_Ficha_Tecnica_Equipo"],
                        "CODEC_Url_Ficha_Tecnica_Equipo"         => $value["CODEC_Url_Ficha_Tecnica_Equipo"],
                        "CODEC_dcto_porcentaje"         => $value["CODEC_dcto_porcentaje"],
                        "CODEC_dcto_importe"         => $value["CODEC_dcto_importe"],
                        "CODEC_dcto_subtotal"         => $value["CODEC_dcto_subtotal"],
                        "CODEC_Archivo_Descripcion_Equipo"       => (isset($archivo) && $archivo != null && $archivo != "null") ? $file_result_equipo->getPath() : null,
                    ]);
                }
            }
        }
        return response()->json(['¡La cotización se guardó correctamente!']);
    }

    public function edit($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        return view("admin.calibracion.edit", compact('cotizacion'));
    }

    public function update(Request $request)
    {
        $id = $request->id_cotizacion;
        $cot = Cotizacion::where('COTIC_Numero', $request->numero)
                ->where('COTIP_Codigo', '!=', $id)
                ->first();
        if($cot !== null){
            return response()->json(['error'=>'¡El número de cotización ya se encuentra registrado!']);
        }

        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->COTIC_Fecha_Cotizacion = $request->fecha;
        $cotizacion->id_contacto            = $request->contacto;
        $cotizacion->COTIC_Numero           = $request->numero;
        $cotizacion->USUA_Codigo            = $request->usuario;
        $cotizacion->COTIC_flag_pedido      = $request->COTIC_flag_pedido;
        $cotizacion->COTIC_dcto_importe     = $request->descuentoImporte;
        $cotizacion->COTIC_dcto_porcentaje  = $request->descuentoPorcentaje;
        $cotizacion->COTIC_dcto_subtotal    = $request->subtotalDescuento;
        $cotizacion->COTIC_SubTotal         = $request->subtotal;
        $cotizacion->COTIC_Igv              = $request->igv;
        $cotizacion->COTIC_Total            = $request->total;
        $cotizacion->COTIC_Correo1          = isset($request->correo1) ? $request->correo1 : "";
        $cotizacion->COTIC_Correo2          = isset($request->correo2) ? $request->correo2 : "";
        $cotizacion->COTIC_Correo3          = isset($request->correo3) ? $request->correo3 : "";
        $cotizacion->COTIC_Correo4          = isset($request->correo4) ? $request->correo4 : "";
        $cotizacion->COTIC_FechaModificacion = date("Y-m-d H:i:s");

        $cotizacion->save();

        if(isset($request->ubigeo)){
            //Actualizar el solicitante
            $solicitante = Solicitante
                            ::join('contacto', 'contacto.SOLIP_Codigo', 'solicitante.SOLIP_Codigo')
                            ->where('contacto.id_contacto', $request->contacto)
                            ->firstOrFail();
            $solicitante->UBIGP_Codigo = $request->ubigeo;
            $solicitante->save();
        }

        //Grabamos equipos
        if(isset($request->equipos)) {
            #region Eliminación de todos los equipos.
            CotizacionDetalle::where('COTIP_Codigo',$id)->delete();
            #endregion
            if(count($request->equipos)>0) {
                foreach($request->equipos as $item=>$value) {
                $archivo = $value["tempFile"];

                $file_result_equipo = null;
                if (isset($archivo) && $archivo != null && $archivo != "null")
                    $file_result_equipo = FileManager::saveFile($archivo, "I");
                    CotizacionDetalle::create([
                        "COTIP_Codigo"                           => $id,
                        "CODEC_Nombre_Equipo"                    => $value["CODEC_Nombre_Equipo"],
                        "CODEC_Descripcion_Equipo"               => $value["CODEC_Descripcion_Equipo"],
                        "CODEC_Fabricante_Equipo"                => $value["CODEC_Fabricante_Equipo"],
                        "CODEC_Cantidad"                         => $value["CODEC_Cantidad"],
                        "CODEC_Costo"                            => $value["CODEC_Costo"],
                        "CODEC_SubTotal"                         => $value["CODEC_Cantidad"]*$value["CODEC_Costo"],
                        "CODEC_Descripcion_Ficha_Tecnica_Equipo" => $value["CODEC_Descripcion_Ficha_Tecnica_Equipo"],
                        "CODEC_Url_Ficha_Tecnica_Equipo"         => $value["CODEC_Url_Ficha_Tecnica_Equipo"],
                        "CODEC_dcto_porcentaje"                  => $value["CODEC_dcto_porcentaje"],
                        "CODEC_dcto_importe"                     => $value["CODEC_dcto_importe"],
                        "CODEC_dcto_subtotal"                    => $value["CODEC_dcto_subtotal"],
                        "CODEC_Archivo_Descripcion_Equipo"       => (isset($archivo) && $archivo != null && $archivo != "null") ? $file_result_equipo->getPath() : $value["CODEC_Archivo_Descripcion_Equipo"]
                    ]);
                }
            }
        }
        return response()->json(['¡La cotización se actualizó correctamente!']);
    }


    public function destroy($id)
    {
    }
}
