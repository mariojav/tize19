<?php

use Illuminate\Database\Seeder;
use App\GrupoMateria;

class GrupoMateriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //grupos introduccion grogramacion
        $grupoMateria = GrupoMateria::create([
            'id'=> 0,
            'nombregrupomat' => 'grupo1',
            'materia_id' => 1,
            'user_id' => 2,
        ]);

        $grupoMateria1 = GrupoMateria::create([
            'id'=> 2,
            'nombregrupomat' => 'grupo2',
            'materia_id' => 1,
            'user_id' => 2,
        ]);

        $grupoMateria2 = GrupoMateria::create([
            'id'=> 3,
            'nombregrupomat' => 'grupo3',
            'materia_id' => 1,
            'user_id' => 2,
        ]);

        $grupoMateria3 = GrupoMateria::create([
            'id'=> 4,
            'nombregrupomat' => 'grupo4',
            'materia_id' => 1,
            'user_id' => 3,
        ]);
        $grupoMateria4 = GrupoMateria::create([
            'id'=> 5,
            'nombregrupomat' => 'grupo5',
            'materia_id' => 1,
            'user_id' => 3,
        ]);$grupoMateria5 = GrupoMateria::create([
            'id'=> 6,
            'nombregrupomat' => 'grupo6',
            'materia_id' => 1,
            'user_id' => 3,
        ]);

        // materias de elementos
        $grupoMateria10 = GrupoMateria::create([
            'id'=> 10,
            'nombregrupomat' => 'grupo1',
            'materia_id' => 2,
            'user_id' => 2,
        ]);

        $grupoMateria12 = GrupoMateria::create([
            'id'=> 12,
            'nombregrupomat' => 'grupo2',
            'materia_id' => 2,
            'user_id' => 2,
        ]);

        $grupoMateria13 = GrupoMateria::create([
            'id'=> 13,
            'nombregrupomat' => 'grupo3',
            'materia_id' => 2,
            'user_id' => 2,
        ]);

        //

        // $grupoMateria33 = GrupoMateria::create([
        //     'id'=>44,
        //     'nombregrupomat' => 'grupo1',
        //     'materia_id' => 3,
        //     'user_id' => 7,
        // ]);

        // $grupoMateria44 = GrupoMateria::create([
        //     'id'=>45,
        //     'nombregrupomat' => 'grupo1',
        //     'materia_id' => 3,
        //     'user_id' => 8,
        // ]);
    }
}
