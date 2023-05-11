<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sesiones;
use DB;

class SesionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($materia_id, $user_id)
    {
        // sesiones.id, sesiones.asistencia, sesiones.descripcion, sesiones.maquina, sesiones.updated_at
        // sesiones.id, sesiones.asistencia, sesiones.descripcion, sesiones.maquina, sesiones.updated_at  
        $sesiones = DB::select('
        SELECT DISTINCT sesiones.id, sesiones.asistencia, sesiones.descripcion, sesiones.maquina, sesiones.updated_at, materias.nombremateria, users.name, users.apellidopaterno, apellidomaterno 
        FROM sesiones, users, materias, grupos_materia, asignaciones
        WHERE users.id = sesiones.user_id and 
        users.id = asignaciones.user_id and
        asignaciones.grupomateria_id = grupos_materia.id and 
        grupos_materia.materia_id = materias.id and
        users.id = '.$user_id.' and
        materias.id = '.$materia_id
        );
        // dd($sesiones);
        return view('docente.materia.sesiones', compact('sesiones', 'materia_id', 'user_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
