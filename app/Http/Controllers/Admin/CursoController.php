<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Descuento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Redirect;

class CursoController extends Controller
{
    public function exportPdf()
    {
        $cursos = Producto::get();
        $pdf = PDF::loadView('pdf.cursos', compact('cursos'));

        return $pdf->download('cursos-list.pdf');
    }

    public function index()
    {
        $cursos = Producto::latest()->paginate(8);
        return view('admin.curso.index', compact('cursos'));
    }

    public function list(){
        $cursos     = Producto::all();
        return $cursos;
    }

    public function create()
    {
        return view("admin.curso.create");
    }

    public function store(Request $request)
    {
        /* Validacion del Formulario */
        // $request->validate([
        //     'nombre' => 'required',
        //     'descripcion' => 'required',
        //     'costo' => 'required'
        // ]);

        Producto::create([
            'CURSOC_Nombre' => request('nombre'),
            'CURSOC_Descripcion' => request('descripcion'),
            'CURSOC_Costo' => request('costo'),
        ]);

        return response()->json(['¡El curso se guardo con exito!']);
        // return Redirect::to("/curso");
    }

    public function get($id)
    {
        $curso = Producto::where('id_curso', $id)->first();
        return $curso;
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        $view = view('admin.curso.show', compact('producto'));
        $pdf = PDF::loadView('admin.curso.show', compact('producto'));
        return $pdf->download('reporte_de_curso.pdf');
    }

    public function edit($id)
    {
        $curso = Producto::findOrFail($id);
        return view("admin.curso.edit", ['curso' => $curso]);
    }

    public function update(Request $request)
    {
        $producto = Producto::findOrFail($request->id);
        $producto->CURSOC_Nombre = $request->nombre;
        $producto->CURSOC_Descripcion = $request->descripcion;
        $producto->CURSOC_Costo = $request->costo;
        $producto->save();

        return response()->json(['¡El curso se guardo con exito!']);

        // return Redirect::to("/curso");
    }

    public function getDescuentos($id)
    {
        $descuentos = Descuento::where('id_curso', $id)->get();
        echo $descuentos;
    }

    public function destroy($id)
    {
        Producto::destroy($id);
        return response()->json(['message' =>'¡El curso se elimino con exito!']);
        // return Redirect::to("/curso");
    }
}
