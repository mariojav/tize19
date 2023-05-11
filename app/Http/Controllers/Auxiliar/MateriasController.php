<?php

namespace App\Http\Controllers\Auxiliar;

use App\Materia;
use App\User;
use DB;

// use App\Actividad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreMateriasRequest;
use App\Http\Requests\Admin\UpdateMateriasRequest;
use Illuminate\Support\Facades\Auth;

class MateriasController extends Controller
{
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
        // $actividades = Actividad::all();

        // return view('auxiliar.materia.index', compact('materias'));
        // return view('auxiliar.materia.index', compact('materias','actividades'));
        $userAuth=Auth::user()->id;
        // $materias=DB::table('materias')->join('grupos_materia','materias.id','=','grupos_materia.materia_id')->where('user_id',$userAuth)->select('user_id','codigomateria','materias.id','nombremateria')->distinct()->get();
        $materias=DB::table('materias')->join('grupos_laboratorio','materias.id','=','grupos_laboratorio.materia_id')->join('asignaciones','grupos_laboratorio.id','=','asignaciones.grupolaboratorio_id')->where('user_id',5)->select('user_id','codigomateria','materias.id','nombremateria','nombregrupolab')->distinct()->get();
        // return $materias;
        
        return view('auxiliar.materia.index', compact('materias'));
        
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
        return view('auxiliar.materia.create');
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
        $userAuth=Auth::user()->id;
        $grupolaboratorioid=DB::table('materias')->join('grupos_laboratorio','materias.id','=','grupos_laboratorio.materia_id')->join('asignaciones','grupos_laboratorio.id','=','asignaciones.grupolaboratorio_id')->where('user_id',5)->where('materia_id',1)->distinct()->pluck('grupolaboratorio_id')->first();
        // $materia=DB::table('asignaciones')->join('grupos_laboratorio','asignaciones.grupolaboratorio_id','=','grupos_laboratorio.id')->where('grupolaboratorio_id',$grupolaboratorioid)->where('materia_id',$id)->join('users','users.id','=','user_id')->join('materias','materias.id','=','grupos_laboratorio.materia_id')->get();
        // $materias=DB::table('materias')->join('grupos_laboratorio','materias.id','=','grupos_laboratorio.materia_id')->join('asignaciones','grupos_laboratorio.id','=','asignaciones.grupolaboratorio_id')->where('user_id',$userAuth)->where('materia_id',$id)->distinct()->get();
        // dd($grupolaboratorioid);

        // $grupolaboratorioid=DB::select('
        // SELECT grupolaboratorio_id
        // FROM grupos_materia, asignaciones, grupos_laboratorio
        // WHERE grupos_materia.id = asignaciones.grupomateria_id and asignaciones.grupolaboratorio_id = grupos_laboratorio.id
        // and grupos_materia.id = '.$id.'
        // ');

        // dd($grupolaboratorioid[0]->grupolaboratorio_id);
        $idTratado = $grupolaboratorioid;
        if($grupolaboratorioid==null){
            $idTratado = -1;
        }

        $materia = DB::select('
        SELECT users.id, users.name, users.apellidopaterno, users.apellidomaterno, users.cedula, users.codigosiss, asignaciones.grupolaboratorio_id
        FROM asignaciones, grupos_materia, users
        WHERE asignaciones.grupomateria_id=grupos_materia.id and asignaciones.user_id=users.id and asignaciones.grupomateria_id='.$id
        .' and asignaciones.grupolaboratorio_id= '.$idTratado.';');
        

        $mat = Materia::findOrFail($id);
        return view('auxiliar.materia.edit', compact('materia','mat'));
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
