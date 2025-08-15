<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\ServicioAcademico;
use Illuminate\Http\Request;
use Redirect;

class ServicioAcademicoController extends Controller
{

    public function index()
    {
        $service = ServicioAcademico::latest()->paginate(8);
        return view('admin.servicioac.index', compact('service'));
    }


    public function create()
    {
        return view("admin.servicioac.create");
    }


    public function store(Request $request)
    {
        /* Validacion del Formulario */
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'costo' => 'required',
        ]);

        ServicioAcademico::create([
            'SERVICIOAC_Nombre' => request('nombre'),
            'SERVICIOAC_Descripcion' => request('descripcion'),
            'SERVICIOAC_Costo' => request('costo'),
        ]);

        return Redirect::to("/servicioac");

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $service = ServicioAcademico::findOrFail($id);

        return view("admin.servicioac.edit", ['servicio' => $service]);
    }


    public function update(Request $request, $id)
    {
        $service = ServicioAcademico::findOrFail($id);

        $service->SERVICIOAC_Nombre = $request->nombre;
        $service->SERVICIOAC_Descripcion = $request->descripcion;
        $service->SERVICIOAC_Costo = $request->costo;

        $service->save();

        return Redirect::to("/servicioac");
    }


    public function destroy($id)
    {
        ServicioAcademico::destroy($id);
        return Redirect::to("/servicioac");
    }
}
