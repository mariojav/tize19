<?php

use Illuminate\Database\Seeder;
use App\GrupoLaboratorio;

class GrupoLaboratorioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupoLaboratorio = GrupoLaboratorio::create([
            'id'=> 10,
            'nombregrupolab' => 'grupo1',
            'materia_id' => 1,
            'laboratorio_id' => 1,
            'diagrupo' => 'lunes',
            'horagrupo' => '12:45-14:15',
        ]);

        $grupoLaboratorio1 = GrupoLaboratorio::create([
            'id'=> 2,
            'nombregrupolab' => 'grupo2',
            'materia_id' => 4,
            'laboratorio_id' => 3,
            'diagrupo' => 'martes',
            'horagrupo' => '14:15-15:45',
        ]);

        $grupoLaboratorio2 = GrupoLaboratorio::create([
            'id'=> 3,
            'nombregrupolab' => 'grupo3',
            'materia_id' => 2,
            'laboratorio_id' => 3,
            'diagrupo' => 'viernes',
            'horagrupo' => '12:45-14:15',
        ]);

        $grupoLaboratorio3 = GrupoLaboratorio::create([
            'id'=> 4,
            'nombregrupolab' => 'grupo3',
            'materia_id' => 2,
            'laboratorio_id' => 3,
            'diagrupo' => 'jueves',
            'horagrupo' => '12:45-14:15',
        ]);

        $grupoLaboratorio4 = GrupoLaboratorio::create([
            'id'=> 5,
            'nombregrupolab' => 'grupo3',
            'materia_id' => 3,
            'laboratorio_id' => 3,
            'diagrupo' => 'lunes',
            'horagrupo' => '12:45-14:15',
        ]);

    }
}
