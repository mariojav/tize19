<?php

namespace App\Http\Controllers;

use App\Laboratorio;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class home extends Controller
{
    private $id = 1;

    public function index(){

        $laboratorios = Laboratorio::all();


        $gruposLabo=DB::select('select * 
        from grupos_laboratorio, materias, laboratorios, grupos_materia 
        where  
        laboratorios.id = grupos_laboratorio.laboratorio_id and 
        grupos_laboratorio.materia_id = materias.id and
        grupos_materia.materia_id = materias.id and
        laboratorio_id = '.$this->id);
        // dd($gruposLabo);
        
        $nombrelaboratorio = ' ';
    
      return view('welcome', compact('gruposLabo', 'laboratorios', 'nombrelaboratorio'));

    }

    public function cargar($id){
        
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

      return view('horarios', compact('gruposLabo', 'laboratorios', 'nombrelaboratorio'));

    }
}
