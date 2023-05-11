<?php

use Illuminate\Database\Seeder;
use App\Laboratorio;

class LaboratorioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laboratorio = Laboratorio::create([
            'id'=>0,
            'nombrelab' => 'labo1',
            'nummaquinas' => '30',
        ]);
        $laboratorio = Laboratorio::create([
            'id'=>2,
            'nombrelab' => 'labo2',
            'nummaquinas' => '35',
        ]);
        $laboratorio = Laboratorio::create([
            'id'=>3,
            'nombrelab' => 'labo3',
            'nummaquinas' => '30',
        ]);
        $laboratorio = Laboratorio::create([
            'id'=>4,
            'nombrelab' => 'labo4',
            'nummaquinas' => '20',
        ]);
        $laboratorio = Laboratorio::create([
            'id'=>5,
            'nombrelab' => 'labo5',
            'nummaquinas' => '38',
        ]);
    }
}
