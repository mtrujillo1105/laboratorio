<?php
namespace App\Http\Controllers\Admin;

use App\Contacto;
use App\Http\Controllers\Controller;
use App\Solicitante;
use App\TipoSolicitante;
use Illuminate\Http\Request;
use Redirect;

class SolicitanteController extends Controller
{
    public function index()
    {
        return view('admin.solicitante.index');
    }

    public function list(){
        $solicitantes = Solicitante
        ::join('tiposolicitante','tiposolicitante.TIPSOLIP_Codigo','=','solicitante.TIPSOLIP_Codigo')
        ->join('ubigeo', 'ubigeo.UBIGP_Codigo', 'solicitante.UBIGP_Codigo')
        ->select('solicitante.*', 'tiposolicitante.*', 'ubigeo.UBIGC_CodDist', 'ubigeo.UBIGC_CodDpto', 'ubigeo.UBIGC_CodProv')
        ->orderBy('solicitante.SOLIP_Codigo', 'ASC')
        ->get();

        return $solicitantes;
    }

    public function create(){
        return view('admin.solicitante.create');
    }

    public function store(Request $request)
    {
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

        return response()->json(['¡El solicitante se guardó correctamente!']);
    }

    public function edit($id){
        $solicitante = Solicitante::findOrFail($id);
        return view("admin.solicitante.edit",['solicitante' => $solicitante]);
    }

    public function get($id)
    {
        $solicitante = Solicitante
        ::join('ubigeo', 'solicitante.UBIGP_Codigo', '=', 'ubigeo.UBIGP_Codigo')
        ->select('solicitante.*', 'ubigeo.UBIGC_CodDpto', 'ubigeo.UBIGC_CodProv', 'ubigeo.UBIGC_CodDist')
        ->findOrFail($id);
        return $solicitante;
    }

    public function update(Request $request){
        $solicitante = Solicitante::findOrFail($request->solicitante['SOLIP_Codigo']);

        $solicitante->TIPSOLIP_Codigo = $request->solicitante['TIPSOLIP_Codigo'];
        $solicitante->UBIGP_Codigo    = $request->solicitante['UBIGP_Codigo'];
        $solicitante->SOLIC_Nombre    = $request->solicitante['SOLIC_Nombre'];
        $solicitante->SOLIC_Ruc       = $request->solicitante['SOLIC_Ruc'];
        $solicitante->SOLIC_Direccion = $request->solicitante['SOLIC_Direccion'];
        $solicitante->SOLIC_Telefono  = $request->solicitante['SOLIC_Telefono'];
        $solicitante->SOLIC_Email     = $request->solicitante['SOLIC_Email'];
        $solicitante->SOLIC_FlagEstado = '1';
        $solicitante->UBIGP_Codigo    = $request->solicitante['UBIGP_Codigo'];

        $solicitante->save();

        return response()->json(['¡El solicitante se guardó correctamente!']);
    }

    public function listTiposSolicitantes()
    {
        $tiposSolicitantes = TipoSolicitante::all();
        return $tiposSolicitantes;
    }

    public function getContacto($id){
        $contacto =
        Solicitante::leftJoin('contacto', 'contacto.SOLIP_Codigo', '=', 'solicitante.SOLIP_Codigo')
        ->select('contacto.id_contacto')
        ->where('solicitante.SOLIP_Codigo', $id)
        ->firstOrFail();

        return $contacto;
    }

    public function destroy($id){
        Solicitante::destroy($id);
        return Redirect::to("/solicitante");
    }

    public function delete($id){
        $contacto = Contacto::where('SOLIP_Codigo', '=', $id)->first();
        if ($contacto != null) {
            return response()->json([
                'message' => 'El solicitante ya tiene un contacto, por lo tanto no se puede eliminar',
                'status' => 'ERROR'
            ]);
        }

        $result  = Solicitante::find($id)->delete();
        if ($result) {
            return response()->json(['message' => 'Solicitante eliminado!']);
        } else {
            return response()->json(['message' => '¡Ocurrió un error!']);
        }
    }
}
