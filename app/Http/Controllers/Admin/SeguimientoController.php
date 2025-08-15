<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Seguimiento;
use Illuminate\Http\Request;

class SeguimientoController extends Controller {
    public function index(){

    }

    public function list($idCotizacion){
        $seguimiento = Seguimiento::where(
                        ["id_cotizacion"=>$idCotizacion])
                        ->orderBy("fecha_registro")
                        ->get();

        return $seguimiento;
    }

    public function create(){

    }

    public function store(Request $request){
        Seguimiento::create([
            // 'id_seguimiento'=> $request->id_seguimiento,
		    'id_cotizacion' => $request->id_cotizacion,
            'titulo'        => $request->titulo,
            'mensaje'       => $request->mensaje,
            'usuario_registro'=> $request->usuario_registro,
            'fecha_seguimiento' =>$request->fecha_seguimiento,
            // 'fecha_modificacion'=> $request->fecha_modificacion,
            // 'usuario_modificacion'=> $request->usuario_modificacion
        ]);

        return response()->json(['mensaje' => 'Se agrego una prueba']);
    }

    public function edit(){

    }

    public function get($id){
        $seguimiento = Seguimiento::where(["id_seguimiento"=>$id])
                        ->first();
        return $seguimiento;
    }

    public function update(Request $request){
        //Update prueba
        $id = $request->id_seguimiento;
        $seguimiento = Seguimiento::findOrFail($id);

        // $seguimiento->id_seguimiento = $request->id_seguimiento;
        // $seguimiento->id_cotizacion  = $request->id_cotizacion;
        $seguimiento->titulo = $request->titulo;
        $seguimiento->mensaje = $request->mensaje;
        $seguimiento->fecha_seguimiento = $request->fecha_seguimiento;
        $seguimiento->fecha_modificacion = $request->fecha_modificacion;
        $seguimiento->usuario_modificacion = $request->usuario_modificacion;

        if($seguimiento->save()){
            return response()->json(['mensaje' => 'Se actualizo el registro']);
        }
        else{
            return response()->json(['error' => 'Ocurrió un error']);
        }
    }

    public function delete($id){
        $result = Seguimiento::find($id)->delete();
        if($result){
            return response()->json(['mensaje'=>'Prueba borrado']);
        }
        else{
            return response()->json(['mensaje'=>'Ocurrio un error']);
        }
    }
}

?>
