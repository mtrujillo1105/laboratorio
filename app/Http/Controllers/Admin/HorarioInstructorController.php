<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\HorarioInstructor;
use App\Instructor;
use Illuminate\Http\Request;
use Redirect;

class HorarioInstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarioinstructors = HorarioInstructor::all();
        $horarioinstructors = HorarioInstructor::join('instructor','instructor.INSTP_Codigo','=','horario_instructor.INSTP_Codigo')->select()->get();
        return view('admin.horario-instructor.index', compact('horarioinstructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instructors = Instructor::pluck('nombre', 'INSTP_Codigo');
        return view("admin.horario-instructor.create", compact('instructors'));
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
/*         $request->validate([
            'nombre' => 'required',
            'fecha_inicial' => 'required',
            'fecha_final' => 'required',
            'hora_ini' => 'required',
            'hora_fi' => 'required'
        ]); */
        if ($request->dia_lunes) {
        $horarioinstructor = new HorarioInstructor;
        $horarioinstructor->INSTP_Codigo = $request->nombre;
        $horarioinstructor->fecha_inicial = $request->fecha_inicial;
        $horarioinstructor->fecha_final = $request->fecha_final;
        $horarioinstructor->Dia_Posible = $request->dia_lunes;
        $horarioinstructor->hora_inicial = $request->hora_ini_lunes;
        $horarioinstructor->hora_final = $request->hora_fi_lunes;
        $horarioinstructor->save();
        }

        if ($request->dia_martes) {
            $horarioinstructor = new HorarioInstructor;
            $horarioinstructor->INSTP_Codigo = $request->nombre;
            $horarioinstructor->fecha_inicial = $request->fecha_inicial;
            $horarioinstructor->fecha_final = $request->fecha_final;
            $horarioinstructor->Dia_Posible = $request->dia_martes;
            $horarioinstructor->hora_inicial = $request->hora_ini_martes;
            $horarioinstructor->hora_final = $request->hora_fi_martes;
            $horarioinstructor->save();
            }
        
        if ($request->dia_miercoles) {
            $horarioinstructor = new HorarioInstructor;
            $horarioinstructor->INSTP_Codigo = $request->nombre;
            $horarioinstructor->fecha_inicial = $request->fecha_inicial;
            $horarioinstructor->fecha_final = $request->fecha_final;
            $horarioinstructor->Dia_Posible = $request->dia_miercoles;
            $horarioinstructor->hora_inicial = $request->hora_ini_miercoles;
            $horarioinstructor->hora_final = $request->hora_fi_miercoles;
            $horarioinstructor->save();
            }
        
        if ($request->dia_jueves) {
            $horarioinstructor = new HorarioInstructor;
            $horarioinstructor->INSTP_Codigo = $request->nombre;
            $horarioinstructor->fecha_inicial = $request->fecha_inicial;
            $horarioinstructor->fecha_final = $request->fecha_final;
            $horarioinstructor->Dia_Posible = $request->dia_jueves;
            $horarioinstructor->hora_inicial = $request->hora_ini_jueves;
            $horarioinstructor->hora_final = $request->hora_fi_jueves;
            $horarioinstructor->save();
            }
    
        if ($request->dia_viernes) {
            $horarioinstructor = new HorarioInstructor;
            $horarioinstructor->INSTP_Codigo = $request->nombre;
            $horarioinstructor->fecha_inicial = $request->fecha_inicial;
            $horarioinstructor->fecha_final = $request->fecha_final;
            $horarioinstructor->Dia_Posible = $request->dia_viernes;
            $horarioinstructor->hora_inicial = $request->hora_ini_viernes;
            $horarioinstructor->hora_final = $request->hora_fi_viernes;
            $horarioinstructor->save();
            }

        if ($request->dia_sabado) {
            $horarioinstructor = new HorarioInstructor;
            $horarioinstructor->INSTP_Codigo = $request->nombre;
            $horarioinstructor->fecha_inicial = $request->fecha_inicial;
            $horarioinstructor->fecha_final = $request->fecha_final;
            $horarioinstructor->Dia_Posible = $request->dia_sabado;
            $horarioinstructor->hora_inicial = $request->hora_ini_sabado;
            $horarioinstructor->hora_final = $request->hora_fi_sabado;
            $horarioinstructor->save();
            }

        if ($request->dia_domingo) {
            $horarioinstructor = new HorarioInstructor;
            $horarioinstructor->INSTP_Codigo = $request->nombre;
            $horarioinstructor->fecha_inicial = $request->fecha_inicial;
            $horarioinstructor->fecha_final = $request->fecha_final;
            $horarioinstructor->Dia_Posible = $request->dia_domingo;
            $horarioinstructor->hora_inicial = $request->hora_ini_domingo;
            $horarioinstructor->hora_final = $request->hora_fi_domingo;
            $horarioinstructor->save();
            }

        return Redirect::to("/horario-instructor");

/*         HorarioInstructor::create([
            'nombre_instructor' => request('nombre'),
            'fecha_inicial' => request('fecha_inicial'),
            'fecha_final' => request('fecha_final'),
            'hora_inicial' => request('hora_ini'),
            'hora_final' => request('hora_fi'),
        ]);

        return Redirect::to("/horario-instructor"); */
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
        $horarioinstructor = HorarioInstructor::findOrFail($id);
        $instructors = Instructor::pluck('nombre', 'nombre');

        return view("admin.horario-instructor.edit", ['horarioinstructor' => $horarioinstructor], compact('instructors'));
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
        $horarioinstructor = HorarioInstructor::findOrFail($id);

        $horarioinstructor->nombre_instructor = $request->nombre;
        $horarioinstructor->fecha_inicial = $request->fecha_inicial;
        $horarioinstructor->fecha_final = $request->fecha_final;
        $horarioinstructor->hora_inicial = $request->hora_in;
        $horarioinstructor->hora_final = $request->hora_fi;

        $horarioinstructor->save();

        return Redirect::to("/horario-instructor");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HorarioInstructor::destroy($id);
        return Redirect::to("/horario-instructor");
    }
}
