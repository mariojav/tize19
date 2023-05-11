<?php


use App\Sesion;


namespace App\Http\Controllers\Auxiliar;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use Carbon\Carbon;

class SesionesController extends Controller
{
    public function index($materia_id, $user_id)
    {
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }
        // dd($materia_id);
        // sesiones.id, sesiones.asistencia, sesiones.descripcion, sesiones.maquina, sesiones.updated_at 
        $sesiones = DB::select('
        select DISTINCT sesiones.id, sesiones.asistencia, sesiones.descripcion, sesiones.maquina, sesiones.updated_at, users.name, users.apellidopaterno, users.apellidomaterno, materias.nombremateria
        from sesiones, users, materias, grupos_materia, asignaciones
        where users.id = sesiones.user_id and 
        users.id = asignaciones.user_id and
        asignaciones.grupomateria_id = grupos_materia.id and 
        grupos_materia.materia_id = materias.id and
        users.id = '.$user_id.' and
        materias.id = '.$materia_id
        );

        // dd($sesiones);
        // dd($sesiones);
        // dd($sesiones);
        // if(count($sesiones)>0){
        //     foreach($sesiones as $sesion){
        //         echo $sesion->id;
        //     }
            
        // }else{
        //     echo "No hay elementos";
        // }
        
        // dd($sesiones);
        return view('auxiliar.sesiones.index', compact('sesiones', 'materia_id', 'user_id'));
        
    }

    /**
     * Show the form for creating new Materia.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($materia_id, $user_id)
    {
        return view('auxiliar.sesiones.create', compact('user_id', 'materia_id'));
    }

    /**
     * Store a newly created Materia in storage.
     *
     * @param  \App\Http\Requests\StoreMateriasRequest  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }


        $asistencia = $request->asistencia;
        // dd($request->descripcion);
        if($request->descripcion <> null){
            $descripcion = $request->descripcion;
        }else{
            $descripcion = "-";
        }

        $maquina = $request->maquina;
        $ip = '0.0.0.0';
        $user_id = $request->user_id;
        $materia_id = $request->materia_id;

        DB::table('sesiones')->insert(
            [
                'asistencia' => $asistencia,
                'descripcion' => $descripcion,
                'maquina' => $maquina,
                'ip' => $ip,
                'user_id' => $user_id,
                'created_at' => Carbon::now('+13:30'),
                'updated_at' => Carbon::now('+13:30')
            ]
        );

        return redirect('sesiones/'.$materia_id.'/'.$user_id);

    }


    /**
     * Show the form for editing Materia.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Seccion editar ".$id;
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
        // $materia = Materia::findOrFail($id);
        // $materia->update($request->all());

        // return redirect()->route('sesiones.index');
    }

    /**
     * Remove Materia from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd("Holamundo");
    }

    public function show(){

       //esto es llamado por destroy
    }

    public function eliminar($id){
        
        // dd($id);
        // if (! Gate::allows('gestion_usuarios')) {
        //     return abort(401);
        // }


        $sesion_id = $id;
        $sesion = \App\Sesion::findOrFail($sesion_id);
        $sesion->delete();
        return redirect()->back();
        // return redirect()->route('sesiones.{1}.{8}');
        // return view('auxiliar.sesiones.index', compact('sesiones', 'materia_id', 'grupo_materia_id', 'user_id'));
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
        // if ($request->input('ids')) {
        //     $entries = Materia::whereIn('id', $request->input('ids'))->get();

        //     foreach ($entries as $entry) {
        //         $entry->delete();
        //     }
        // }
        // return "Se eliminar`a el registro ".$id;
    }


}
