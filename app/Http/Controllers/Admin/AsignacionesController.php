<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Materia;
use App\Asignacion;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreAsignacionesRequest;
use App\Http\Requests\Admin\UpdateAsignacionesRequest;
use Spatie\Permission\Models\Role;
use DB;

class AsignacionesController extends Controller
{
    //
    /**
     * Display a listing of Asignacion.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }

        $asignaciones = Asignacion::all();
        // return Materia::first()->gruposMateria;

        return view('admin.asignacion.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating new Asignacion.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        
        $roles = Role::all();
        $users = \App\User::with('roles')->get();
        $nonmembers = $users->reject(function ($user, $key) {
            return $user->hasRole('docente')||$user->hasRole('administrator');
        });

        $hola= Collect([]);
        foreach($nonmembers as $nonmember){
            $ids=$nonmember->id;
            $full=$nonmember->name." ".$nonmember->apellidopaterno." ".$nonmember->apellidomaterno." ".$nonmember->cedula;
            $complet=Collect(['$key'=>$ids,'$var'=>$full]);
            $hola->push($complet);
        }

        $gruposMateria=DB::table('materias')->join('grupos_materia','grupos_materia.materia_id','=','materias.id')->get();

        $matgrupo= Collect([]);
        foreach($gruposMateria as $grupmat){
            $ids=$grupmat->id;
            $full=$grupmat->nombregrupomat." ".$grupmat->nombremateria;
            $complet=Collect(['$key'=>$ids,'$var'=>$full]);
            $matgrupo->push($complet);
        }

        // return $matgrupo;
        // return $nonmembers;
        return view('admin.asignacion.create',compact('hola','matgrupo'));
    }





    /**
     * Store a newly created Asignacion in storage.
     *
     * @param  \App\Http\Requests\StoreAsignacionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsignacionesRequest $request)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        Asignacion::create($request->all());

        return redirect()->route('admin.asignaciones.index');

    }


    /**
     * Show the form for editing Asignacion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $asignacion = Asignacion::findOrFail($id);

        return view('admin.asignacion.edit', compact('asignacion'));
    }

    /**
     * Update Asignacion in storage.
     *
     * @param  \App\Http\Requests\UpdateAsignacionesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsignacionesRequest $request, $id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $asignacion = Asignacion::findOrFail($id);
        $asignacion->update($request->all());

        return redirect()->route('admin.asignaciones.index');
    }


    /**
     * Remove Asignacion from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $asignacion = Asignacion::findOrFail($id);
        $asignacion->delete();

        return redirect()->route('admin.asignaciones.index');
    }

    /**
     * Delete all selected Asignacion at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Asignacion::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}











