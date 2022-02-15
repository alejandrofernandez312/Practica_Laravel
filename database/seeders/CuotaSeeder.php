<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cuota;

class CuotaSeeder extends Seeder
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
        DB::table('cuota')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        Cuota::create([
            'concepto' => 'Arreglo de puerta',
            'f_emision' => '2021-02-11',
            'importe' => 45.54 ,
            'pagada' => 'S',
            'f_pago' => '2021-02-11',
            'notas' => 'Ascensor muy antigüo',
            'cliente_id' => 1
        ]);

        Cuota::create([
            'concepto' => 'Polea averiada',
            'f_emision' => '2021-03-12',
            'importe' => 155.98 ,
            'pagada' => 'S',
            'f_pago' => '2021-03-15',
            'notas' => 'Polea rota por engranajes',
            'cliente_id' => 2
        ]);
    }
}
