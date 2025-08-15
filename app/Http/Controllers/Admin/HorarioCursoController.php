<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\HorarioCurso;
use App\Producto;
use App\AperturaCurso;
use App\Instructor;
use Illuminate\Http\Request;
use Redirect;

class HorarioCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $horariocursos = HorarioCurso::join('curso','curso.id_curso','=','horario_apertura_curso.id_curso')->select()->get();
        return view('admin.horario-curso.index', compact('horariocursos'));
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
        return view("admin.horario-curso.create", compact('productos'), compact('instructors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validacion del Formulario */
        $request->validate([
            'nombre' => 'required',
            'apertura' => 'required',
            'fecha_inicial' => 'required',
/*             'hora_ini' => 'required',
            'hora_fi' => 'required', */
            'nombre_instructor' => 'required',
        ]);

        $apertura = new AperturaCurso;
        $apertura->Nombre_Apertura = $request->apertura;
        $apertura->Fecha_Apertura = $request->fecha_inicial;
        $apertura->Cantidad_Horas = $request->num_horas;
        $apertura->Matriculados = $request->num_matriculados;
        $apertura->id_curso = $request->nombre;
        $apertura->INSTP_Codigo = $request->nombre_instructor;
        $apertura->save();

        if ($request->dia_lunes)
        {
            $horariocurso = new HorarioCurso;
            $horariocurso->Dia_Dictado = $request->dia_lunes;
            $horariocurso->Hora_Inicio = $request->hora_ini_lunes;
            $horariocurso->Hora_Fin = $request->hora_fi_lunes;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();

/*             $apertura->horarioApertura()->create([
                'Dia_Dictado' => request('dia_lunes'),
            ]); */
            }

/*         HorarioCurso::create([
            'nombre_curso' => request('nombre'),
            'fecha_inicial' => request('fecha_inicial'),
            'fecha_final' => request('fecha_final'),
            'hora_inicial' => request('hora_in'),
            'hora_final' => request('hora_fi'), 
            'hora_inicial' => request('hora_ini'),
            'hora_final' => request('hora_fi'),
        ]); */

        if ($request->dia_martes) 
        {
            $horariocurso = new HorarioCurso;
            $horariocurso->Dia_Dictado = $request->dia_martes;
            $horariocurso->Hora_Inicio = $request->hora_ini_martes;
            $horariocurso->Hora_Fin = $request->hora_fi_martes;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        if ($request->dia_miercoles) 
        {
            $horariocurso = new HorarioCurso;
            $horariocurso->Dia_Dictado = $request->dia_miercoles;
            $horariocurso->Hora_Inicio = $request->hora_ini_miercoles;
            $horariocurso->Hora_Fin = $request->hora_fi_miercoles;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        if ($request->dia_jueves) 
        {
            $horariocurso = new HorarioCurso;
            $horariocurso->Dia_Dictado = $request->dia_jueves;
            $horariocurso->Hora_Inicio = $request->hora_ini_jueves;
            $horariocurso->Hora_Fin = $request->hora_fi_jueves;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        if ($request->dia_viernes) 
        {
            $horariocurso = new HorarioCurso;
            $horariocurso->Dia_Dictado = $request->dia_viernes;
            $horariocurso->Hora_Inicio = $request->hora_ini_ivernes;
            $horariocurso->Hora_Fin = $request->hora_fi_viernes;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        if ($request->dia_sabado) 
        {
            $horariocurso = new HorarioCurso;
            $horariocurso->Dia_Dictado = $request->dia_sabado;
            $horariocurso->Hora_Inicio = $request->hora_ini_sabado;
            $horariocurso->Hora_Fin = $request->hora_fi_sabado;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        if ($request->dia_domingo) 
        {
            $horariocurso = new HorarioCurso;
            $horariocurso->Dia_Dictado = $request->dia_domingo;
            $horariocurso->Hora_Inicio = $request->hora_ini_domingo;
            $horariocurso->Hora_Fin = $request->hora_fi_domingo;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        return Redirect::to("/horario-curso");
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
        $horariocurso = HorarioCurso::findOrFail($id);
        $productos = Producto::pluck('CURSOC_Nombre', 'id_curso');
        $instructors = Instructor::pluck('nombre', 'INSTP_Codigo');
        return view("admin.horario-curso.create", compact('productos'), compact('instructors'));

        return view("admin.horario-curso.edit", ['horariocurso' => $horariocurso], compact('productos'), compact('instructor'));
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
        $apertura = AperturaCurso::findOrFail($id);
        $horariocurso = HorarioCurso::findOrFail($id);
        $apertura->Fecha_Apertura = $request->fecha_inicial;
        $apertura->Cantidad_Horas = $request->num_horas;
        $apertura->Matriculados = $request->num_matriculados;
        $apertura->id_curso = $request->nombre;
        $apertura->INSTP_Codigo = $request->nombre_instructor;
        $apertura->save();

        

        if ($request->dia_lunes) 
        {
        $horariocurso->Dia_Dictado = $request->dia_lunes;
        $horariocurso->Hora_Inicio = $request->hora_ini_lunes;
        $horariocurso->Hora_Fin = $request->hora_fi_lunes;
        $horariocurso->ID_Apertura = $apertura->ID_Apertura;
        $horariocurso->id_curso = $request->nombre;
        $horariocurso->INSTP_Codigo = $request->nombre_instructor;
        $horariocurso->save();
        }

        if ($request->dia_martes) 
        {
            $horariocurso->Dia_Dictado = $request->dia_martes;
            $horariocurso->Hora_Inicio = $request->hora_ini_martes;
            $horariocurso->Hora_Fin = $request->hora_fi_martes;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        if ($request->dia_miercoles) 
        {
            $horariocurso->Dia_Dictado = $request->dia_miercoles;
            $horariocurso->Hora_Inicio = $request->hora_ini_miercoles;
            $horariocurso->Hora_Fin = $request->hora_fi_miercoles;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        if ($request->dia_jueves) 
        {
            $horariocurso->Dia_Dictado = $request->dia_jueves;
            $horariocurso->Hora_Inicio = $request->hora_ini_jueves;
            $horariocurso->Hora_Fin = $request->hora_fi_jueves;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        if ($request->dia_viernes) 
        {
            $horariocurso->Dia_Dictado = $request->dia_viernes;
            $horariocurso->Hora_Inicio = $request->hora_ini_ivernes;
            $horariocurso->Hora_Fin = $request->hora_fi_viernes;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        if ($request->dia_sabado) 
        {
            $horariocurso->Dia_Dictado = $request->dia_sabado;
            $horariocurso->Hora_Inicio = $request->hora_ini_sabado;
            $horariocurso->Hora_Fin = $request->hora_fi_sabado;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        if ($request->dia_domingo) 
        {
            $horariocurso->Dia_Dictado = $request->dia_domingo;
            $horariocurso->Hora_Inicio = $request->hora_ini_domingo;
            $horariocurso->Hora_Fin = $request->hora_fi_domingo;
            $horariocurso->ID_Apertura = $apertura->ID_Apertura;
            $horariocurso->id_curso = $request->nombre;
            $horariocurso->INSTP_Codigo = $request->nombre_instructor;
            $horariocurso->save();
        }

        return Redirect::to("/horario-curso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HorarioCurso::destroy($id);
        return Redirect::to("/horario-curso");
    }
}
