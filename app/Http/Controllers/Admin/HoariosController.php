<?php

namespace App\Http\Controllers\Admin;

use App\Laboratorio;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoariosController extends Controller
{   
    private $id = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratorios = Laboratorio::all();
  
        // $gruposLabo=DB::table('grupos_laboratorio')
        // ->join('laboratorios', 'laboratorios.id', '=','grupos_laboratorio.laboratorio_id') // ->join('laboratorios', 'laboratorios.id', '=','grupos_laboratorio.laboratorio_id')
        // ->join('materias', 'materias.id', '=', 'grupos_laboratorio.materia_id')
        // ->select('*')->get();

        // $gruposLabo=DB::select('select * from grupos_laboratorio, materias, laboratorios where  laboratorio_id = 1');
        //$this->id = 5;

        $gruposLabo=DB::select('select * 
        from grupos_laboratorio, materias, laboratorios, grupos_materia 
        where  
        laboratorios.id = grupos_laboratorio.laboratorio_id and 
        grupos_laboratorio.materia_id = materias.id and
        grupos_materia.materia_id = materias.id and
        laboratorio_id = '.$this->id);
        // dd($gruposLabo);
        
        $nombrelaboratorio = ' ';
        
      return view('admin.horario.horario', compact('gruposLabo', 'laboratorios', 'nombrelaboratorio'));
    
    }

    public function horarios($id){
        
        $laboratorios = Laboratorio::all();

        $gruposLabo=DB::select('select * 
        from grupos_laboratorio, materias, laboratorios, grupos_materia 
        where  
        laboratorios.id = grupos_laboratorio.laboratorio_id and 
        grupos_laboratorio.materia_id = materias.id and
        grupos_materia.materia_id = materias.id and
        laboratorio_id = '.$id);

        $nombrelabo=DB::select('select nombrelab from laboratorios where id = '.$id);
        $nombrelaboratorio = $nombrelabo[0]->nombrelab;

      return view('admin.horario.horario', compact('gruposLabo', 'laboratorios', 'nombrelaboratorio')); 

    }
    
}
