<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Ensayo;
use App\Solicitante;
use App\Contacto;
use App\Cotizacion;
use App\Capacitacion;
use App\Producto;
use App\TipoSolicitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;

class CapacitacionController extends Controller
{
    public function index()
    {
        return view('admin.capacitacion.index');
    }

    public function list()
    {
        $capacitaciones =
            Cotizacion::join('contacto', 'contacto.id_contacto', '=', 'cotizacion.id_contacto')
            ->join('solicitante', 'solicitante.SOLIP_Codigo', '=', 'contacto.SOLIP_Codigo')
            ->leftJoin('users', 'users.id', 'cotizacion.USUA_Codigo')
            ->select('cotizacion.*', 'solicitante.SOLIC_Nombre', 'contacto.*', 'users.name')
            ->where('cotizacion.TIPOCOP_Codigo', 3)
            ->get();

        return $capacitaciones;
    }

    public function create()
    {
        return view("admin.capacitacion.create");
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
            'id_contacto'               => $request->contacto,
            'COTIC_Numero'              => $request->numero,
            'COTIC_Fecha_Cotizacion'    => $request->fecha,
            'USUA_Codigo'               => $request->usuario,
            'COTIC_SubTotal'            => $request->subtotal,
            'COTIC_Igv'                 => $request->igv,
            'COTIC_Total'               => $request->total,
            'COTIC_Correo1'             => isset($request->correo1) ? $request->correo1 : "",
            'COTIC_Correo2'             => isset($request->correo2) ? $request->correo2 : "",
            'COTIC_Correo3'             => isset($request->correo3) ? $request->correo3 : "",
            'COTIC_Correo4'             => isset($request->correo4) ? $request->correo4 : "",
            'TIPOCOP_Codigo'            => 3,
            'COTIC_dcto_subtotal'       => $request->subtotalDescuento,
            'COTIC_dcto_porcentaje'     => $request->descuentoPorcentaje,
            'COTIC_dcto_importe'        => $request->descuentoImporte,
            'COTIC_flag_pedido'         => $request->COTIC_flag_pedido
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
        //Grabamos capacitaciones
        if (isset($request->capacitaciones)) {
            if (count($request->capacitaciones) > 0) {
                foreach ($request->capacitaciones as $value) {
                    $capacitacion = Capacitacion::create([
                        'COTIP_Codigo'                  => $cot->COTIP_Codigo,
                        'id_curso'                      => $value["id_curso"],
                        'COCAC_Cantidad'                => $value["COCAC_Cantidad"],
                        'COCAC_Costo_Curso_Original'    => $value["COCAC_Costo_Curso_Original"],
                        'COCAC_SubTotal'                => $value["COCAC_SubTotal"],
                        'COCAC_Descuento_Porcentaje'    => $value["COCAC_Descuento_Porcentaje"],
                        'COCAC_Descuento_Moneda_Real'   => $value["COCAC_Descuento_Moneda_Real"],
                        'COCAC_SubTotal_Descontado'     => $value["COCAC_SubTotal_Descontado"],
                        'COCAC_Detalle_Curso_Cotizar'   => $value["COCAC_Detalle_Curso_Cotizar"],
                        'COCAC_Horario_Tentativo_Curso' => $value["COCAC_Horario_Tentativo_Curso"],
                        'COCAC_Lugar_Capacitacion'      => $value["COCAC_Lugar_Capacitacion"]
                    ]);
                }
            }
        }
        return response()->json(['¡La cotización se guardó correctamente!']);
    }

    public function edit($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        return view("admin.capacitacion.edit", compact('cotizacion'));
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

        //Grabamos capacitaciones
        if (isset($request->capacitaciones)) {
            #region Eliminación de todas las capacitaciones.
            Capacitacion::where('COTIP_Codigo',$id)->delete();
            #endregion
            if (count($request->capacitaciones) > 0) {
                foreach ($request->capacitaciones as $value) {
                    Capacitacion::create([
                        'COTIP_Codigo'                  => $id,
                        'id_curso'                      => $value["id_curso"],
                        'COCAC_Cantidad'                => $value["COCAC_Cantidad"],
                        'COCAC_Costo_Curso_Original'    => $value["COCAC_Costo_Curso_Original"],
                        'COCAC_SubTotal'                => $value["COCAC_SubTotal"],
                        'COCAC_Descuento_Porcentaje'    => $value["COCAC_Descuento_Porcentaje"],
                        'COCAC_Descuento_Moneda_Real'   => $value["COCAC_Descuento_Moneda_Real"],
                        'COCAC_SubTotal_Descontado'     => $value["COCAC_SubTotal_Descontado"],
                        'COCAC_Detalle_Curso_Cotizar'   => $value["COCAC_Detalle_Curso_Cotizar"],
                        'COCAC_Horario_Tentativo_Curso' => $value["COCAC_Horario_Tentativo_Curso"],
                        'COCAC_Lugar_Capacitacion'      => $value["COCAC_Lugar_Capacitacion"]
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
