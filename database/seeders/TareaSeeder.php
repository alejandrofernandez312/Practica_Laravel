<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tarea;

class TareaSeeder extends Seeder
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
        DB::table('tarea')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        Tarea::create([
            'nombre' => 'Diogo',
            'telefono' => 690121029,
            'descripcion' => 'Los botones del ascensor no responden',
            'email' => 'diogo@gmail.com',
            'direccion' => 'C/Amapola 67',
            'estado' => 'F',
            'f_crea' => date('Y-m-d'),
            'f_rea' => date('Y-m-d'),
            'anot_anteriores' => '',
            'anot_posteriores' => 'Los botones no estaban conectados a la corriente',
            'fichero' => 'botones.txt',
            'cliente_id' => 1
        ]);
    }
}
