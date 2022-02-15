<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarea;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ClienteSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(CuotaSeeder::class);
        $this->call(TareaSeeder::class);
        Tarea::factory(10)->create();
    }
}
