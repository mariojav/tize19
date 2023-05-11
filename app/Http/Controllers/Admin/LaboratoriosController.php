<?php

namespace App\Http\Controllers\Admin;

use App\Laboratorio;

use DB;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreLaboratoriosRequest;
use App\Http\Requests\Admin\UpdateLaboratoriosRequest;


class LaboratoriosController extends Controller
{
    /**
     * Display a listing of Laboratorio.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }

        $laboratorios = Laboratorio::all();
        $notificacion = "";
        $tipo = "null";
        return view('admin.laboratorio.index', compact('laboratorios', 'notificacion', 'tipo'));
    }

    /**
     * Show the form for creating new Laboratorio.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        return view('admin.laboratorio.create');
    }

    /**
     * Store a newly created Laboratorio in storage.
     *
     * @param  \App\Http\Requests\StoreLaboratoriosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLaboratoriosRequest $request)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        Laboratorio::create($request->all());

        return redirect()->route('admin.laboratorios.index');

    }


    /**
     * Show the form for editing Laboratorio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $laboratorio = Laboratorio::findOrFail($id);

        return view('admin.laboratorio.edit', compact('laboratorio'));
    }

    /**
     * Update Laboratorio in storage.
     *
     * @param  \App\Http\Requests\UpdateLaboratoriosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaboratoriosRequest $request, $id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }

        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->update($request->all());
        // $notificacion = "";
        return redirect()->route('admin.laboratorios.index');
    }


    /**
     * Remove Laboratorio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $idExiste = DB::select("select count(*) as n from laboratorios where laboratorios.id = ".$id);
        // dd($idExiste);
        $laboratorios = Laboratorio::all();
        if($idExiste[0]->n > 0){    
            $cantidadGruposLaboratorio = DB::select("
            select count(*) as cantidad
            from laboratorios, grupos_laboratorio
            where laboratorios.id = grupos_laboratorio.laboratorio_id and laboratorios.id = ".$id."
            ");
            
            // dd($cantidadGruposLaboratorio);
            $notificacion = "";
            // $tipo = "";
            if($cantidadGruposLaboratorio[0]->cantidad == 0){ // Si no tiene dependencias procede a eliminar
                
                $laboratorio = Laboratorio::findOrFail($id);
                $laboratorio->delete();
                $notificacion = "El laboratorio se elimino correctamente";
                // $tipo = "alert alert-success";
                // dd($notificacion);
                return back()->with('contiene', $notificacion);
            }else{
                $notificacion = "No se puede eliminar el laboratorio, tiene elementos dependientes!";
                // $tipo = "alert alert-warning";
                return back()->with('notificacion', $notificacion);
            }

        }else{
            return redirect()->route('admin.laboratorios.index');
        }
    }

    /**
     * Delete all selected Laboratorio at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Laboratorio::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}












