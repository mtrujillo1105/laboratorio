<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\CursoInstructor;
use App\Instructor;
use App\Producto;
use Illuminate\Http\Request;
use Redirect;
use DB;

class CursoInstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursoinstructors = DB::table('curso_instructor')
        ->join('curso', 'curso.id_curso', '=', 'curso_instructor.id_curso')
        ->join('instructor', 'instructor.INSTP_Codigo', '=', 'curso_instructor.INSTP_Codigo')
        ->select()
        ->get();
        return view('admin.instructor-curso.index', compact('cursoinstructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::pluck('CURSOC_Nombre', 'id_curso');
        $instructors = Instructor::pluck('nombre', 'INSTP_Codigo');
        return view("admin.instructor-curso.create", compact('productos'), compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $curso_instructor = new CursoInstructor;
        $curso_instructor->id_curso = $request->nombre_curso;
        $curso_instructor->id_curso = $request->nombre_curso;
        $curso_instructor->INSTP_Codigo = $request->nombre_instructor;
        $curso_instructor->save();
/*         $curso_instructor->instructor()->sync([$curso_instructor->id_curso]);
        $curso_instructor->curso()->sync([$curso_instructor->INSTP_Codigo]); */

        return Redirect::to("/instructor-curso");
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
        $cursoinstructor = CursoInstructor::findOrFail($id);
        $productos = Producto::pluck('CURSOC_Nombre', 'CURSOC_Nombre');
        $instructors = Instructor::pluck('nombre', 'nombre');


        return view("admin.instructor-curso.edit", ['cursoinstructor' => $cursoinstructor], compact('productos'), compact('instructors'));
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
        $cursoinstructor = CursoInstructor::findOrFail($id);

        $CursoInstructor->nombre_curso = $request->nombre_curso;
        $CursoInstructor->nombre_instructor = $request->nombre_instructor;

        $horariocurso->save();

        return Redirect::to("/instructor-curso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CursoInstructor::destroy($id);
        return Redirect::to("/instructor-curso");
    }
}
