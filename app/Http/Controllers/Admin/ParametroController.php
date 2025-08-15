<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Parametro;
use App\ParametroValor;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
    public function index()
    {
        return view('admin.parametros.index');
    }

    public function list(){
        $parametro = Parametro
        ::where('eliminado', 0)
        ->orderBy('id_parametro', 'ASC')
        ->get();

        return response()->json($parametro);
    }

    public function create(){

    }

    public function store(Request $request)
    {
        $parametro = new Parametro();

        $parametro->id = $request->solicitante['id'];
        $parametro->nombre = $request->solicitante['nombre'];
        $parametro->id_parametro_padre = $request->solicitante['id_parametro_padre'];
        $parametro->eliminado = 0;

        $parametro->save();

        return response()->json(['¡El parametro se guardó correctamente!']);
    }

    public function edit($id){

    }

    public function get(Request $request)
    {
        $parametro_valor = ParametroValor
                    ::leftJoin('parametro', 'parametro.id_parametro', '=', 'parametro_valor.id_parametro')
                    ->select('parametro_valor.*', 'parametro.nombre as nombre_parametro')
                    ->where('parametro_valor.eliminado', 0);
                    // ->orderBy('id_parametro_valor', 'ASC')
                    // ->get();

        if($request->codigoParametro != null){
            $parametro_valor = $parametro_valor->where('parametro.id_parametro',$request->codigoParametro);
        }

        if($request->descripcionParametro != null || $request->descripcionParametro != ''){
            $parametro_valor = $parametro_valor
                ->where('parametro_valor.nombre', 'LIKE', "%$request->descripcionParametro%")
                ->where('parametro_valor.valor', 'LIKE', "%$request->descripcionParametro%");
        }

        $parametro_valor = $parametro_valor
                        ->orderBy('id_parametro_valor', 'ASC')
                        ->get();

        return $parametro_valor;
    }

    public function guardar_parametro(Request $request){

        $parametro_valor = ParametroValor::where('id_parametro_valor', '=', $request->id_parametro_valor)
            ->first();

        if($parametro_valor == null){
            ParametroValor::create([
                'id_parametro' => $request->id_parametro,
                'id_parametro_valor' => $request->id_parametro_valor,
                'nombre' => $request->nombre,
                'orden' => $request->orden,
                'valor' => $request->valor,
                'valor_adicional_1' => $request->valor_adicional_1,
                'valor_adicional_2' => $request->valor_adicional_2,
                'valor_adicional_3' => $request->valor_adicional_3,
                'eliminado' => 0,
                // 'activo' => $request->activo
            ]);
        }else{
            // $parametro_valor->id_parametro_valor = $request->id_parametro_valor;

            $parametro_valor->id_parametro = $request->id_parametro;
            $parametro_valor->nombre = $request->nombre;
            $parametro_valor->orden = $request->orden;
            $parametro_valor->valor = $request->valor;
            $parametro_valor->activo = $request->activo;
            $parametro_valor->valor_adicional_1 = $request->valor_adicional_1;
            $parametro_valor->valor_adicional_2 = $request->valor_adicional_2;
            $parametro_valor->valor_adicional_3 = $request->valor_adicional_3;
            $parametro_valor->eliminado = 0;

            $parametro_valor->save();
        }

        return response()->json(['message' => '¡El parametro se guardó correctamente!']);
    }

    public function update(Request $request){
        $parametro = Parametro::findOrFail($request->solicitante['SOLIP_Codigo']);

        $parametro->nombre = $request->parametro['nombre'];
        $parametro->id_parametro_padre = $request->parametro['id_parametro_padre'];

        $parametro->save();

        return response()->json(['¡El parametro se guardó correctamente!']);
    }

    public function list_parametros_sistema(){
        return ParametroValor::orderBy('parametro_valor.id', 'ASC')->get();
    }

    public function delete($id){
        $parametro = ParametroValor::findOrFail($id);

        $parametro->eliminado = 1;

        $parametro->save();

        return response()->json(['message' => 'Parametro eliminado!']);

    }
}
