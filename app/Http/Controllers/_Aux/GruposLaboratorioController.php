<?php

namespace App\Http\Controllers\Aux;

use App\GrupoLaboratorio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreGruposLaboratorioRequest;
use App\Http\Requests\Admin\UpdateGruposLaboratorioRequest;


class GruposLaboratorioController extends Controller
{
    /**
     * Display a listing of GrupoLaboratorio.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $dias = ['l'=>'lunes','m'=>'martes','mi'=>'miercoles','j'=>'jueves','v'=>'viernes'];

        if (!Gate::allows('gestion_usuarios')) {

            return abort(401);
        }

        $gruposLaboratorio = GrupoLaboratorio::all();

        return view('admin.grupoLaboratorio.index', compact('gruposLaboratorio','dias'));
    }

    /**
     * Show the form for creating new GrupoLaboratorio.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        return view('admin.grupoLaboratorio.create');
    }

    /**
     * Store a newly created GrupoLaboratorio in storage.
     *
     * @param  \App\Http\Requests\StoregruposLaboratorioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoregruposLaboratorioRequest $request)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        GrupoLaboratorio::create($request->all());

        return redirect()->route('admin.gruposLaboratorio.index');

    }


    /**
     * Show the form for editing GrupoLaboratorio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $grupoLaboratorio = GrupoLaboratorio::findOrFail($id);

        return view('admin.grupoLaboratorio.edit', compact('grupoLaboratorio'));
    }

    /**
     * Update GrupoLaboratorio in storage.
     *
     * @param  \App\Http\Requests\UpdategruposLaboratorioRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategruposLaboratorioRequest $request, $id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $grupoLaboratorio = GrupoLaboratorio::findOrFail($id);
        $grupoLaboratorio->update($request->all());

        return redirect()->route('admin.gruposLaboratorio.index');
    }


    /**
     * Remove GrupoLaboratorio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $grupoLaboratorio = GrupoLaboratorio::findOrFail($id);
        $grupoLaboratorio->delete();

        return redirect()->route('admin.gruposLaboratorio.index');
    }

    /**
     * Delete all selected GrupoLaboratorio at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = GrupoLaboratorio::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}












