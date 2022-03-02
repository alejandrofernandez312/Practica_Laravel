<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class PruebasTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // public function test_example()
    // {
    //     $response = $this->get('/tareas');

    //     $response->assertStatus(200);
    // }


    public function test_incidencia()
    {
        $empleado = Empleado::where('tipo', 'A')->first();
        $this->actingAs($empleado)->get('/incidencia')->assertStatus(200);
    }

    public function test_tareasNoAsignadas()
    {
        $empleado = Empleado::where('tipo', 'A')->first();
        $this->actingAs($empleado)->get('/tareasNoAsignadas')->assertStatus(200);
    }

    public function test_tareas()
    {
        $empleado = Empleado::where('tipo', 'A')->first();
        $this->actingAs($empleado)->get('/tareas')->assertStatus(200);
    }

    public function test_clientes()
    {
        $empleado = Empleado::where('tipo', 'A')->first();
        $this->actingAs($empleado)->get('/clientes')->assertStatus(200);
    }

    public function test_empleados()
    {
        $empleado = Empleado::where('tipo', 'A')->first();
        $this->actingAs($empleado)->get('/empleados')->assertStatus(200);
    }

    public function test_cuotas()
    {
        $empleado = Empleado::where('tipo', 'A')->first();
        $this->actingAs($empleado)->get('/cuotas')->assertStatus(200);
    }

    public function test_empleadosJS()
    {
        $empleado = Empleado::where('tipo', 'A')->first();
        $this->actingAs($empleado)->get('/empleadosJS')->assertStatus(200);
    }
}
