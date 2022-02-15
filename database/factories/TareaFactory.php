<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'telefono' => "999888777",
            'descripcion' => $this->faker->sentence(5),
            'email' => $this->faker->unique()->safeEmail(),
            'direccion' => $this->faker->address(),
            'estado' => "C",
            'f_crea' => "2021-02-11",
            'f_rea' => "2022-02-11",
            'anot_anteriores' => $this->faker->sentence(3),
            'anot_posteriores' => $this->faker->sentence(3),
            'fichero' => "fichero.txt",
            'cliente_id' => 1
        ];
    }
}
