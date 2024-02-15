<?php

namespace Database\Factories;

use App\Models\Process;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Process::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'Gestión de Recursos Humanos' => [1],
            'Gestión Financiera' => [2],
            'Gestión de Operaciones' => [3],
            'Gestión de Ventas y Marketing' => [4],
            'Gestión de Proyectos' => [5],
            'Atención al Cliente' => [6],
            'Tecnologías de la Información' => [7],
            'Investigación y Desarrollo' => [8],
        ];
        $unit = $this->faker->randomElement(array_keys($data));
        return [
            'id' => $data[$unit][0],
            'name' => $unit,
            'number_process' => $data[$unit][0] . '.' . $data[$unit][0],
        ];
    }
}
