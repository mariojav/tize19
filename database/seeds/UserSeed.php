<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'id'=>0,
            'name' => 'admin',
            'apellidopaterno' => 'admin',
            'apellidomaterno' => 'admin',
            'cedula' => '7095164',
            'codigosiss' => '201300964',
            'email' => 'admin@admin.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('administrador');

        $user = User::create([
            'id'=>2,
            'name' => 'maria',
            'apellidopaterno' => 'merlo',
            'apellidomaterno' => 'Mamani',
            'cedula' => '6251489',
            'codigosiss' => '102354895',
            'email' => 'docente@docente.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('docente');

        $user = User::create([
            'id'=>3,
            'name' => 'juan',
            'apellidopaterno' => 'cari',
            'apellidomaterno' => 'sosa',
            'cedula' => '1090526',
            'codigosiss' => '562684951',
            'email' => 'docente1@docente.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('docente');

        $user = User::create([
            'id'=>4,
            'name' => 'Rosa',
            'apellidopaterno' => 'marina',
            'apellidomaterno' => 'roca',
            'cedula' => '5986854',
            'codigosiss' => '562148452',
            'email' => 'docente2@docente.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('docente');


        $user = User::create([
            'id'=>5,
            'name' => 'carolina',
            'apellidopaterno' => 'gomez',
            'apellidomaterno' => 'suares',
            'cedula' => '2695418',
            'codigosiss' => '845962515',
            'email' => 'auxiliar@auxiliar.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('auxiliar');

        $user = User::create([
            'id'=>6,
            'name' => 'rodrigo',
            'apellidopaterno' => 'garcia',
            'apellidomaterno' => 'madona',
            'cedula' => '6954124',
            'codigosiss' => '203652145',
            'email' => 'auxiliar1@auxiliar.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('auxiliar');
        
        $user = User::create([
            'id'=>7,
            'name' => 'romina',
            'apellidopaterno' => 'rafael',
            'apellidomaterno' => 'medrano',
            'cedula' => '9651254',
            'codigosiss' => '152365489',
            'email' => 'auxiliar2@auxiliar.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('auxiliar');


        $user = User::create([
            'id'=>8,
            'name' => 'mario',
            'apellidopaterno' => 'soliz',
            'apellidomaterno' => 'Mamani',
            'cedula' => '2512516',
            'codigosiss' => '954125163',
            'email' => 'estudiante@estudiante.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('estudiante');

        $user = User::create([
            'id'=>9,
            'name' => 'sandra',
            'apellidopaterno' => 'carina',
            'apellidomaterno' => 'ramos',
            'cedula' => '102515',
            'codigosiss' => '201545845',
            'email' => 'estudiante1@estudiante.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('estudiante');

        $user = User::create([
            'id'=>10,
            'name' => 'luis',
            'apellidopaterno' => 'caisa',
            'apellidomaterno' => 'merlo',
            'cedula' => '8451210',
            'codigosiss' => '120365485',
            'email' => 'estudiante2@estudiante.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('estudiante');

        $user = User::create([
            'id'=>11,
            'name' => 'romario',
            'apellidopaterno' => 'carlota',
            'apellidomaterno' => 'mollo',
            'cedula' => '5621457',
            'codigosiss' => '215489562',
            'email' => 'estudiante3@estudiante.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('estudiante');

        $user = User::create([
            'id'=>12,
            'name' => 'micaela',
            'apellidopaterno' => 'rodriguez',
            'apellidomaterno' => 'veronica',
            'cedula' => '5123512',
            'codigosiss' => '965214851',
            'email' => 'estudiante4@estudiante.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('estudiante');

        $user = User::create([
            'id'=>13,
            'name' => 'milton',
            'apellidopaterno' => 'juanes',
            'apellidomaterno' => 'betoben',
            'cedula' => '5265154',
            'codigosiss' => '985451263',
            'email' => 'estudiante5@estudiante.com',
            'password' => bcrypt('holamundo')
        ]);
        $user->assignRole('estudiante');

    }
}
