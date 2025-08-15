<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\AsesoriaLab;
use Illuminate\Http\Request;
use Redirect;

class AsesoriaController extends Controller
{

    public function index()
    {
        $asesorialabs = AsesoriaLab::latest()->paginate(8);
        return view('admin.asesoria.index', compact('asesorialabs'));
    }


    public function create()
    {
        return view("admin.asesoria.create");
    }


    public function store(Request $request)
    {
        /* Validacion del Formulario */
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        AsesoriaLab::create([
            'ASESORIA_Nombre' => request('nombre'),
            'ASESORIA_Descripcion' => request('descripcion'),
            'ASESORIA_Costo' => request('costo'),
        ]);

        return Redirect::to("/asesoria");

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $asesorialabs = AsesoriaLab::findOrFail($id);

        return view("admin.asesoria.edit", ['asesorialabs' => $asesorialabs]);
    }


    public function update(Request $request, $id)
    {
        $asesorialabs = AsesoriaLab::findOrFail($id);
        $asesorialabs->ASESORIA_Nombre = $request->nombre;
        $asesorialabs->ASESORIA_Descripcion = $request->descripcion;
        $asesorialabs->save();
        return Redirect::to("/asesoria");
    }


    public function destroy($id)
    {
        AsesoriaLab::destroy($id);
        return Redirect::to("/asesoria");
    }
}
