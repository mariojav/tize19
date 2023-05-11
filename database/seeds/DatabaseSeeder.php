<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(MateriaSeed::class);
        $this->call(GrupoMateriaSeed::class);
        $this->call(LaboratorioSeed::class);
        $this->call(GrupoLaboratorioSeed::class);
        $this->call(AsignacionSeed::class);
        
        $this->call(PostsTableSeeder::class);
    }
}
