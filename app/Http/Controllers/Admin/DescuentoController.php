<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use App\Producto;
use App\Descuento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DescuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*       $descuentos = descuentos::latest()->paginate(8); */
        $descuentos = Descuento::all();
        $descuentos = Descuento::join('curso', 'curso.id_curso', '=', 'descuentos.id_curso')->select()->get();
        return view('admin.descuento.index', compact('descuentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::pluck('CURSOC_Nombre', 'id_curso');

        return view("admin.descuento.create", compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $descuento_curso = Descuento::where('id_curso', $request->id_curso);
        if($descuento_curso != null){
            $descuento_curso->delete();
        }

        foreach ($request->detalleDescuentos as $key => $value) {
            Descuento::create([
                'id_curso' => $value["id_curso"],
                'cantidad_min' => $value["cantidad_min"],
                'cantidad_max' => $value["cantidad_max"],
                'descuento' => $value["descuento"],
            ]);
        }

        return response()->json(['¡El descuento se guardo con exito!']);
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
        $productos = Producto::findOrFail($id);
        // $descuento = Descuento::findOrFail($id);

        return view("admin.descuento.edit", ['curso' => $productos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $descuento = Descuento::findOrFail($id);

        $descuento->id_curso = $request->nombre;
        $descuento->cantidad_min = $request->cant_min;
        $descuento->cantidad_max = $request->cant_max;
        $descuento->descuento = $request->descuento;

        $descuento->save();

        return Redirect::to("/descuento");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Descuento::where('id_curso',$id)
            ->delete();
        return response()->json(['message' =>'¡Los descuentos se eliminaron con exito!']);
        // return Redirect::to("/descuento");
    }

    public function list()
    {
        $descuento = Descuento::leftJoin('curso', 'curso.id_curso', '=', 'descuentos.id_curso')
            ->select('curso.id_curso', 'curso.CURSOC_Nombre', DB::raw('count(0) as cantidad_descuentos'))
            ->groupBy('curso.id_curso', 'curso.CURSOC_Nombre')
            ->get();
        return $descuento;
    }
}
