<?php

use Illuminate\Database\Seeder;
use App\Materia;

class MateriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materia = Materia::create([
            'id'=>0,
            'nombremateria' => 'Introduccion a la programacion',
            'codigomateria' => 'pro-1',
        ]);

        $materia = Materia::create([
            'id'=>2,
            'nombremateria' => 'Elementos y estructura de datos',
            'codigomateria' => 'ele-1',
        ]);

        $materia = Materia::create([
            'id'=>3,
            'nombremateria' => 'Computacion',
            'codigomateria' => 'comp-1',
        ]);

        $materia = Materia::create([
            'id'=>4,
            'nombremateria' => 'Aplicacion de Sistemas Operativos',
            'codigomateria' => 'apli-1',
        ]);

        $materia = Materia::create([
            'id'=>5,
            'nombremateria' => 'Taller de Sistemas Operativos',
            'codigomateria' => 'aso-1',
        ]);
    }
}
