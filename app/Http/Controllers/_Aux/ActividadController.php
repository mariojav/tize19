<?php

namespace App\Http\Controllers\Aux;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Database\Seeder;
use App\Actividad;
use App\Post;
use Carbon\Carbon;
use App\Category;
use App\Tag;

class ActividadController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($materia_id, $estudiante_id)
    {   
        

        // $estudiantes=DB::select('
        // SELECT Distinct users.id, actividads.id As actividad_id, actividads.fecha, users.cedula, users.name, users.apellidopaterno, users.apellidomaterno, 
        // tareas.titulotarea, actividads.observaciones, actividads.descripcion
        
        // FROM actividads, users, materias, grupos_materia, portafolios, tareas, asignaciones

        // WHERE materias.id = '.$materia_id.
        // ' and materias.id = grupos_materia.materia_id
        //   and grupos_materia.id = asignaciones.grupomateria_id
        //   and users.id = ' .$estudiante_id.
        // ' and asignaciones.user_id = users.id
        //   and users.id = portafolios.user_id 
        //   and portafolios.id = tareas.portafolio_id
        //   and tareas.id = actividads.tareas_id;
        // ');

        $estudiantes=DB::select('
        SELECT Distinct users.id, actividads.id As actividad_id, actividads.fecha, users.cedula, users.name, users.apellidopaterno, users.apellidomaterno, 
        publicacions.nombre, tareas.titulotarea, actividads.observaciones, actividads.descripcion
        
        FROM actividads, users, materias, grupos_materia, portafolios, tareas, asignaciones, publicacions

        WHERE materias.id = '.$materia_id.
        ' and materias.id = grupos_materia.materia_id
          and grupos_materia.id = asignaciones.grupomateria_id
          and users.id = ' .$estudiante_id.
        ' and asignaciones.user_id = users.id
          and users.id = portafolios.user_id 
          and portafolios.id = tareas.portafolio_id
          and tareas.id = actividads.tareas_id
          and publicacions.id = tareas.publicacion_id;
        ');


        // $tareas=DB::select('
        // select Distinct tareas.id, tareas.titulotarea 
        // from  materias, grupos_materia, asignaciones, users, portafolios, tareas
        // where users.id = ' . $estudiante_id .
        // ' and  materias.id = ' . $materia_id.'
        //   and materias.id = grupos_materia.materia_id
        //   and grupos_materia.id = asignaciones.grupomateria_id
        //   and asignaciones.user_id = users.id
        //   and users.id = portafolios.user_id
        //   and portafolios.id = tareas.portafolio_id
        //   and users.id = tareas.user_id
        //   and tareas.id NOT IN (SELECT actividads.tareas_id FROM actividads)
        // ');

        $tareas=DB::select('
        select Distinct tareas.publicacion_id, publicacions.nombre,tareas.id, tareas.titulotarea 
        from  materias, grupos_materia, asignaciones, users, portafolios, tareas, publicacions
        where users.id = ' . $estudiante_id .
        ' and  materias.id = ' . $materia_id.'
          and materias.id = grupos_materia.materia_id
          and grupos_materia.id = asignaciones.grupomateria_id
          and asignaciones.user_id = users.id
          and users.id = portafolios.user_id
          and portafolios.id = tareas.portafolio_id
          and users.id = tareas.user_id
          and publicacions.id = tareas.publicacion_id
          and tareas.id NOT IN (SELECT actividads.tareas_id FROM actividads)
        ');

        // dd($tareas);
        //Si no tiene registros nunca mandara el nombre por eso esa linea
        $nombre=DB::select('select users.name, users.apellidopaterno, users.apellidomaterno from users where users.id = '.$estudiante_id);
        // dd($estudiantes);
        return view('aux.actividades.index',compact('estudiantes', 'tareas', 'nombre'));
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
        // dd($request->request);
        // echo $request->tarea_id;
        if($request->tarea_id <> '-1'){
            $observaciones = "*";
            foreach($_POST as $nombre_campo => $valor){ //$nombre_campo es el nombre del identificador
                // echo $nombre_campo . ' -> '.$valor .' ------ ';
                if($nombre_campo === 'copio' or $nombre_campo === 'recibio' or $nombre_campo === 'perjudico' or $nombre_campo === 'abandono' or $nombre_campo === 'saco'){
                    if($observaciones <> "*"){
                        $observaciones = $observaciones . '  *' . $valor;
                    }else{
                        $observaciones = $observaciones . '' . $valor;
                    }
                }
            }
            $post = new Actividad;
            $post->observaciones = $observaciones;
            $post->descripcion = $request->descripcion;
            $post->fecha = Carbon::now();
            $post->tareas_id = $request->tarea_id;
            $post->save();
            // dd($request);
        }
        return back();

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
        // $materia = Materia::findOrFail($id);
        // echo $id;
        // return view('aux.actividades.index');
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
        echo "se eliminara el archivo ".$id;
    }
}
