<?php
namespace App\Http\Controllers\Admin;
use App\Prueba;
use App\Cotizacion;
use App\Capacitacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CotizacionCapacitacionController extends Controller
{
    public function index(){

    }

    public function list($id){
        $capacitaciones = Capacitacion::where(
                        ["COTIP_Codigo"=>$id])
                        ->orderBy("COCAP_Codigo")
                        ->get();
        $objeto = array();
        foreach($capacitaciones as $value){
            $capacitacion = $value;
            array_push($objeto, $capacitacion);
        }
        return $objeto;
    }

    public function create(){

    }

    public function delete($id)
    {
        Capacitacion::where('COTIP_Codigo',$id)->delete();
        $result  = Cotizacion::find($id)->delete();

        if($result)
            return response()->json(['message'=>'¡Capacitación eliminada!']);
        else
            return response()->json(['message'=>'Ocurrio un error']);
    }

    public function destroy($id)
    {
        Capacitacion::destroy($id);
        return response()->json(['message'=>'Capacitación borrada']);
    }

    public function destroyById($id){
        Capacitacion::where('COTIP_Codigo',$id)->firstorfail()->delete();
        return response()->json(['message'=>'Capacitación borrada']);
    }
}
