<?php

namespace App\Http\Controllers\Admin;

use App\GrupoMateria;
use App\User;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreGruposMateriaRequest;
use App\Http\Requests\Admin\UpdateGruposMateriaRequest;

use Spatie\Permission\Models\Role;


class GruposMateriaController extends Controller
{
    /**
     * Display a listing of GrupoMateria.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        if (!Gate::allows('gestion_usuarios')) {

            return abort(401);
        }

        $gruposMateria = GrupoMateria::all();

        return view('admin.grupoMateria.index', compact('gruposMateria'));
    }

    /**
     * Show the form for creating new GrupoMateria.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        // $otro = new Collection();
        // foreach (User::all() as $user){
        //     if($user->roles()->pluck('name')->first() == 'estudiante'){
        //       $otro.dd($user);
        //     }
        // }
        // return $otro;
        // return view('admin.grupoMateria.create');
        
        $roles = Role::all();
        $users = \App\User::with('roles')->get();
        $nonmembers = $users->reject(function ($user, $key) {
            return !$user->hasRole('docente');
        });
        // $lola = $nonmembers->pluck(DB::raw('CONCAT(apellidopaterno , " ",apellidomaterno) AS apsfasdfafd'),'id');
        // $lola = $nonmembers->only(['id','name']);

        // $nonmembers = $lola->map(function($user){return collect($user->toArray())->only(['id','name','apellidopaterno','apellidomaterno','cedula'])->all();});

        // dd($nonmembers);
        // $array= json_decode($nonmembers, true);
        // collect($array);
        // return $nonmembers;

        // return $nonmembers;
        // return $nonmembers;

        $hola= Collect([]);
        foreach($nonmembers as $nonmember){
            $ids=$nonmember->id;
            $full=$nonmember->name." ".$nonmember->apellidopaterno." ".$nonmember->apellidomaterno." ".$nonmember->cedula;
            $complet=Collect(['$key'=>$ids,'$var'=>$full]);
            $hola->push($complet);
        }

        // return $hola;
        return view('admin.grupoMateria.create',compact('hola'));

        // return view('admin.report_roles', ['roles'=>$roles, 'nonmembers' => $nonmembers]);
    }

    /**
     * Store a newly created GrupoMateria in storage.
     *
     * @param  \App\Http\Requests\StoregruposMateriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoregruposMateriaRequest $request)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        GrupoMateria::create($request->all());

        return redirect()->route('admin.gruposMateria.index');

    }


    /**
     * Show the form for editing GrupoMateria.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $grupoMateria = GrupoMateria::findOrFail($id);


        $roles = Role::all();
        $users = \App\User::with('roles')->get();
        $nonmembers = $users->reject(function ($user, $key) {
            return !$user->hasRole('docente');
        });

        $hola= Collect([]);
        foreach($nonmembers as $nonmember){
            $ids=$nonmember->id;
            $full=$nonmember->name." ".$nonmember->apellidopaterno." ".$nonmember->apellidomaterno." ".$nonmember->cedula;
            $complet=Collect(['$key'=>$ids,'$var'=>$full]);
            $hola->push($complet);
        }

        // return view('admin.grupoMateria.create',compact('hola'));

        return view('admin.grupoMateria.edit', compact('grupoMateria','hola'));
    }

    /**
     * Update GrupoMateria in storage.
     *
     * @param  \App\Http\Requests\UpdategruposMateriaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategruposMateriaRequest $request, $id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $grupoMateria = GrupoMateria::findOrFail($id);
        $grupoMateria->update($request->all());

        return redirect()->route('admin.gruposMateria.index');
    }


    /**
     * Remove GrupoMateria from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        $grupoMateria = GrupoMateria::findOrFail($id);
        $grupoMateria->delete();

        return redirect()->route('admin.gruposMateria.index');
    }

    /**
     * Delete all selected GrupoMateria at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gestion_usuarios')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = GrupoMateria::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}












