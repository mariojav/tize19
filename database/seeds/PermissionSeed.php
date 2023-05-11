<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create([
            'id' => 0,
            'name' => 'gestion_usuarios',
        ]);

        Permission::create([
            'id' => 2,
            'name' => 'gestion_laboratorios',
        ]);

        Permission::create([
            'id' => 3,
            'name' => 'gestion_materias',
        ]);

        Permission::create([
            'id' => 4,
            'name' => 'gestion_gruposLaboratorio',
        ]);

        Permission::create([
            'id' => 5,
            'name' => 'gestion_gruposMateria',
        ]);

        Permission::create([
            'id' => 6,
            'name' => 'gestion_inscripciones',
        ]);

        Permission::create([
            'id' => 7,
            'name' => 'calificar',
        ]);

        Permission::create([
            'id' => 8,
            'name' => 'lista_materias',
        ]);

        Permission::create([
            'id' => 9,
            'name' => 'lista_estudiantes',
        ]);

        Permission::create([
            'id' => 10,
            'name' => 'gestion_tareas',
        ]);

        Permission::create([
            'id' => 11,
            'name' => 'registrar_actividad',
        ]);

        Permission::create([
            'id' => 12,
            'name' => 'presentar_tareas',
        ]);

        Permission::create([
            'id' => 13,
            'name' => 'horarios',
        ]);

        Permission::create([
            'id' => 14,
            'name' => 'portafolio',
        ]);
    }
}
