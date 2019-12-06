<?php

use Illuminate\Database\Seeder;
use App\Modelos\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Usuario::create([
         	'Cuenta' => 'dan',
         	'password' => '123456',
            'Rol' => 'Trabajador',
            'Nombre' => 'Daniel',
            'Apellido' => 'Ramirez',
            'Ci' => '7262318',
            'Estado' => 'Alta',

            ]);

        Usuario::create([
        	'Cuenta' => 'jp',
            'password' => '123456',
            'Rol' => 'Trabajador',
            'Nombre' => 'Juan',
            'Apellido' => 'Perez',
            'Ci' => '7202020',
            'Estado' => 'Alta',

            ]);
        Usuario::create([
            'Cuenta' => 'admin',
            'password' => 'admin123',
            'Rol' => 'Administrador',
            'Nombre' => 'Pedro',
            'Apellido' => 'Soto',
            'Ci' => '7654321',
            'Estado' => 'Alta',

            ]);


    }
}
