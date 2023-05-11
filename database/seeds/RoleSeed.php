<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'id' => 0,
            'name' => 'administrador',
            ]);
        $role->givePermissionTo('gestion_usuarios','gestion_laboratorios','gestion_materias','gestion_gruposLaboratorio','gestion_gruposMateria','gestion_inscripciones','horarios');

        $role1 = Role::create([
            'id' => 2,
            'name' => 'docente',
            ]);
        $role1->givePermissionTo('calificar','lista_materias','lista_estudiantes','gestion_tareas','horarios','portafolio');

        $role2 = Role::create([
            'id' => 3,
            'name' => 'auxiliar',
            ]);
        $role2->givePermissionTo('lista_materias','lista_estudiantes','registrar_actividad','horarios','portafolio');

        $role3 = Role::create([
            'id' => 4,
            'name' => 'estudiante',
            ]);
        $role3->givePermissionTo('lista_materias','presentar_tareas','horarios','portafolio');
    }
}
