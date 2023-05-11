<?php

use Illuminate\Database\Seeder;
use App\Asignacion;

class AsignacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asignacion = Asignacion::create([
            'id'=> 0,
            'user_id' => 5,
            'grupomateria_id'=> null,
            'grupolaboratorio_id'=> 2,
        ]);

        $asignacion = Asignacion::create([
            'id'=> 2,
            'user_id' => 6,
            'grupomateria_id'=> null,
            'grupolaboratorio_id'=> 3,
        ]);

        $asignacion = Asignacion::create([
            'id'=> 3,
            'user_id' => 7,
            'grupomateria_id'=> null,
            'grupolaboratorio_id'=> 4,
        ]);


        $asignacion = Asignacion::create([
            'id'=> 4,
            'user_id' => 8,
            'grupomateria_id'=> 1,
            'grupolaboratorio_id'=> 10,
        ]);

        $asignacion = Asignacion::create([
            'id'=> 5,
            'user_id' => 9,
            'grupomateria_id'=> 1,
            'grupolaboratorio_id'=> 10,
        ]);

        $asignacion = Asignacion::create([
            'id'=> 6,
            'user_id' => 10,
            'grupomateria_id'=> 1,
            'grupolaboratorio_id'=> 10,
        ]);
        
    }
}
