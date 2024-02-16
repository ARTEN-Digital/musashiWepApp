<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lines>
 */
class LinesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'P1 CARRIER' => [1],
            'P4 CARRIER' => [2],
            'P1 RING' => [3],
            'LLCVT' => [4],
            'MCVT' => [5],
            'DIFERENCIAL' => [6],
        ];
        // Selecciona una unidad aleatoria
        $unit = $this->faker->randomElement(array_keys($data));
        return [
            'id' => $data[$unit][0],
            'name' => $unit,
        ];
    }
}
