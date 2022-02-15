<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('cliente')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        Cliente::create([
            'nombre' => 'Juan Antonio',
            'cif' => '46763524Q',
            'telefono' => 665743646,
            'email' => 'cobos@gmail.com',
            'cuenta_corriente' => '9878-7653-2435',
            'moneda' => 'EUR',
            'pais_id' => 4
        ]);

        Cliente::create([
            'nombre' => 'Alejandro',
            'cif' => '46824524Q',
            'telefono' => 661202646,
            'email' => 'delgado@gmail.com',
            'cuenta_corriente' => '9228-7653-2435',
            'moneda' => 'DOL',
            'pais_id' => 8
        ]);
    }
}
