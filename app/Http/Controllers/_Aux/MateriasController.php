<?php

namespace App\Http\Controllers\Aux; // Descomentar
// namespace App;
// use App\Materia;
use DB;
use App\Materia;
use App\Actividad;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreMateriasRequest;
use App\Http\Requests\Admin\UpdateMateriasRequest;


//librerias


// use App\Materia;


// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

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

        $materias = Materia::all();
        $actividades = Actividad::all();

        return view('aux.materia.index', compact('materias','actividades'));
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
        //Id de la materia
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }
        // dd($id);

        $materia = Materia::findOrFail($id);

        $estudiantes=DB::select('SELECT users.id, users.name, users.apellidopaterno, users.apellidomaterno, users.cedula, users.codigosiss 
        FROM materias, grupos_materia, asignaciones, users
        WHERE
            materias.id = grupos_materia.materia_id and
            grupos_materia.id = asignaciones.grupomateria_id and
            asignaciones.user_id = users.id and
            materias.id = '.$id);
        
        return view('aux.materia.edit', compact('materia', 'estudiantes'));
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
