<?php

namespace Database\Factories;

use App\Models\Positions;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Positions::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'Director Ejecutivo' => [1],
            'Director Financiero' => [2],
            'Director de Operaciones' => [3],
            'Supervisor de Tecnología' => [4],
            'Director de Marketing' => [5],
            'Director de Recursos Humanos' => [6],
            'Director de Información' => [7],
            'Director de Ventas' => [8],
            'Gerente de Proyectos' => [9],
            'Analista Financiero' => [10],
            'Operador de maquinas' => [11],
        ];
        $unit = $this->faker->randomElement(array_keys($data));
        return [
            'id' => $data[$unit][0],
            'name' => $unit,
        ];
    }
}
