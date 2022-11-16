<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RecintoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->text(), 
            'coste_alquiler' => $this->faker->numberBetween(5000,10000),
            'precio_entrada' => $this->faker->numberBetween(20,150), 
        ];
    }
}
