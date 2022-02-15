<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //Borrar los datos
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('empleado')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        Empleado::create([
            'nombre' => 'Diogo',
            'password' => '1234',
            'DNI' => '46763524Q',
            'email' => 'diogo@gmail.com',
            'telefono' => 665743646,
            'direccion' => 'C/Amapola 67',
            'f_alta' => date('Y-m-d'),
            'tipo' => 'A'
        ]);

        Empleado::create([
            'nombre' => 'Javier',
            'password' => '1234',
            'DNI' => '46111124Q',
            'email' => 'javier@gmail.com',
            'telefono' => 661213646,
            'direccion' => 'C/Nardo 12',
            'f_alta' => date('Y-m-d'),
            'tipo' => 'A'
        ]);

        Empleado::create([
            'nombre' => 'Gonzalo',
            'password' => '1234',
            'DNI' => '46121124R',
            'email' => 'gonzalo@gmail.com',
            'telefono' => 661213646,
            'direccion' => 'C/Matorral 42',
            'f_alta' => date('Y-m-d'),
            'tipo' => 'O'
        ]);

        Empleado::create([
            'nombre' => 'Luis',
            'password' => '1234',
            'DNI' => '46113124A',
            'email' => 'luis@gmail.com',
            'telefono' => 661903646,
            'direccion' => 'C/Geranio 33',
            'f_alta' => date('Y-m-d'),
            'tipo' => 'O'
        ]);
    }
}
