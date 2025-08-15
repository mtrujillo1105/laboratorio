<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Contacto;
use App\Cotizacion;
use App\Role;
use Illuminate\Http\Request;
use Redirect;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contacto::all();
        return view('admin.contacto.index',compact('contactos'));
    }

    public function list(){
        $contactos = Contacto
        ::join('solicitante','solicitante.SOLIP_Codigo','=','contacto.SOLIP_Codigo')
        ->select()
        ->get();
        return $contactos;
    }
    public function listBySolicitante($id){
        $contactos = Contacto
        // ::join('solicitante','solicitante.SOLIP_Codigo','=','contacto.SOLIP_Codigo')
        ::select()
        ->where('contacto.SOLIP_Codigo', $id)
        ->get();

        return $contactos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Contacto::create([
            'SOLIP_Codigo'     => $request->solicitante,
            'nombre_contacto'  => $request->nombres,
            'correo_contacto'  => $request->correo,
            'celular_contacto' => $request->celular
        ]);
        return response()->json(['¡El contacto se guardó correctamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacto::findOrFail($id);
        return view("admin.contacto.edit", ['contacto' => $contacto]);
    }

    public function get($id){
        return Contacto::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $contacto = Contacto::findOrFail($request->id);

        $contacto->SOLIP_Codigo     = $request->solicitante;
        $contacto->nombre_contacto  = $request->nombres;
        $contacto->correo_contacto  = $request->correo;
        $contacto->celular_contacto = $request->celular;

        $contacto->save();

        return response()->json(['¡El contacto se guardó correctamente!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cotizacion = Cotizacion::where('id_contacto', $id)
                        ->first();
        if($cotizacion != null){
            return response()->json([
                'message' => 'El contacto ya tiene una o mas cotizaciones, no se puede eliminar.',
                'status' => 'ERROR'
            ]);
        }

        Contacto::destroy($id);
        return response()->json(['message'=>'Contacto eliminado!']);
    }


    public function getSolicitante($id){
        $solicitante =
        Contacto::leftJoin('solicitante', 'solicitante.SOLIP_Codigo', '=', 'contacto.SOLIP_Codigo')
        ->select('solicitante.SOLIP_Codigo')
        ->where('contacto.id_contacto', $id)
        ->firstOrFail();

        return $solicitante;
    }
}
