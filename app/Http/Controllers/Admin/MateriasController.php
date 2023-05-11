<?php

namespace App\Http\Controllers\Admin;

use App\Materia;

use DB;

use Illuminate\Http\Request;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreMateriasRequest;
use App\Http\Requests\Admin\UpdateMateriasRequest;

class MateriasController extends Controller
{
    /**
     * Display a listing of Materia.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gestion_usuarios')) {
            // return abort(401);
        }

        $materias = Materia::all();

        $notificacion = "";
        return view('admin.materia.index', compact('materias', 'notificacion'));
    }

    /**
     * Show the form for creating new Materia.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gestion_usuarios')) {
            // return abort(401);
        }
        return view('admin.materia.create');
    }

    /**
     * Store a newly created Materia in storage.
     *
     * @param  \App\Http\Requests\StoreMateriasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateriasRequest $request)
    {
        if (! Gate::allows('gestion_usuarios')) {
            // return abort(401);
        }
        Materia::create($request->all());

        return redirect()->route('admin.materias.index');

    }


    /**
     * Show the form for editing Materia.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            // return abort(401);
        }
        $materia = Materia::findOrFail($id);

        return view('admin.materia.edit', compact('materia'));
    }

    public function home($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            // return abort(401);
        }
        $materia = Materia::findOrFail($id);

        return view('admin.materia.home', compact('materia'));
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
        if (! Gate::allows('gestion_usuarios')) {
            // return abort(401);
        }
        $materia = Materia::findOrFail($id);
        $materia->update($request->all());

        return redirect()->route('admin.materias.index');
    }


    /**
     * Remove Materia from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            // return abort(401);
        }

        $cantidadGruposMateria = DB::select('
        select count(*) as cantidad
        from materias, grupos_materia
        where materias.id = grupos_materia.materia_id and materias.id = ' . $id);
        // dd($cantidadGruposMateria);

        $cantidadGruposLaboratorio = DB::select('
        select count(*) as cantidad
        from materias, grupos_laboratorio 
        where materias.id = grupos_laboratorio.materia_id and materias.id = ' . $id);
        
        $notificacion = "";
        if($cantidadGruposLaboratorio[0]->cantidad == 0 and $cantidadGruposMateria[0]->cantidad == 0){ //Si no tiene dendencias
            $materia = Materia::findOrFail($id);
            $materia->delete();

            $notificacion = "La materia se elimino correctamente";
            $materias = Materia::all();
            // return redirect()->route('admin.materias.index');
            // return view('admin.materia.index', compact('materias', 'notificacion', 'tipo'));
            return back()->with('contiene', $notificacion);
        }else{
            // return redirect()->route('admin.materias.index');

            $materias = Materia::all();
            $notificacion = "La materia que intentas eliminar tiene elementos dependientes";

            // return view('admin.materia.index', compact('materias', 'notificacion', 'tipo'));
            return back()->with('notificacion', $notificacion);
        }
        //return view('admin.materia.index', compact('materias', 'notificacion'));
    }

    /**
     * Delete all selected Materia at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gestion_usuarios')) {
            // return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Materia::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}

