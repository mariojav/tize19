<?php

namespace App\Http\Controllers\Docente;

use App\Materia;
use App\Actividad;
use App\User;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreMateriasRequest;
use App\Http\Requests\Admin\UpdateMateriasRequest;
use Illuminate\Support\Facades\Auth;

class MateriasController extends Controller
{   


    public function cargarActividades($materia_id, $estudiante_id){
        // dd($materia_id);
        $datosEstudiante= DB::select('select * 
        from users
        where users.id = '.$estudiante_id .'
        ');

        $datosMateria = DB::select('select * 
        from materias
        where materias.id = '.$materia_id.'
        ');

        $actividad = DB::select('select * 
        from materias, grupos_materia, publicacions, users, tareas, actividads
        where materias.id = grupos_materia.materia_id
        and grupos_materia.id = publicacions.grupos_materia_id
        and publicacions.id = tareas.publicacion_id
        and tareas.id = actividads.tareas_id
        and users.id = tareas.user_id
        and users.id = '.$estudiante_id.'
        and materias.id = '.$materia_id.';
        ');

        // dd($datosEstudiante);

        return view('docente.materia.actividades', compact('datosMateria', 'datosEstudiante', 'actividad'));
    }

    /**
     * Display a listing of Materia.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }

        // $materias = Materia::all();
        $userAuth=Auth::user()->id;
        // $materias=DB::table('grupos_materia')->join('materias','materias.id','=','grupos_materia.materia_id')->where('user_id',$userAuth)->get();
        $materias=DB::table('materias')->join('grupos_materia','materias.id','=','grupos_materia.materia_id')->where('user_id',$userAuth)->select('user_id','codigomateria','materias.id','nombremateria')->distinct()->get();
        // $materias=DB::table('materias')->join('id','grupos_materia','materias.id','=','grupos_materia.materia_id')->where('user_id',$userAuth)->select('nombremateria','codigomateria','nombregrupomat')->distinct()->get();
        // $materias=DB::table('materias')->join('grupos_materia','materias.id','=','grupos_materia.materia_id')->where('user_id',$userAuth)->select('nombremateria')->distinct()->get();
        // return $materias;

        // $actividades = Actividad::all();

        // return view('doc.materia.index', compact('materias','actividades'));
        return view('docente.materia.index', compact('materias'));
    }

    /**
     * Show the form for creating new Materia.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }
        return view('aux.materia.create');
    }

    /**
     * Store a newly created Materia in storage.
     *
     * @param  \App\Http\Requests\StoreMateriasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateriasRequest $request)
    {
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }
        Materia::create($request->all());

        return redirect()->route('materias.index');

    }


    /**
     * Show the form for editing Materia.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }
        $materia = Materia::findOrFail($id);
        $materiaId=$id;
        $docenteId=Auth::user()->id;


        $lola=DB::table('asignaciones')->join('grupos_materia','asignaciones.grupomateria_id','=','grupos_materia.id')->join('users','asignaciones.user_id','=','users.id')->where('grupos_materia.user_id',$docenteId)->where('grupos_materia.materia_id',$materiaId)->get();


        return view('docente.materia.edit', compact('materia','materiaId','docenteId','lola'));
    }

    /**
     * Update Materia in storage.
     *
     * @param  \App\Http\Requests\UpdateMateriasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMateriasRequest $request, $id)
    {
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }
        $materia = Materia::findOrFail($id);
        $materia->update($request->all());

        return redirect()->route('materias.index');
    }


    /**
     * Remove Materia from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }
        $materia = Materia::findOrFail($id);
        $materia->delete();

        return redirect()->route('materias.index');
    }

    /**
     * Delete all selected Materia at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }
        if ($request->input('ids')) {
            $entries = Materia::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
