<?php

namespace Database\Factories;

use App\Models\Areas;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AreasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Areas::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'name' => $this->faker->word(),
        // ];

        $data = [
            'Dirección' => [1],
            'Administración' => [2],
            'Ventas' => [3],
            'Producción ' => [4],
            'Contabilidad' => [5],
            'Recursos humanos' => [6],
            'Ingeniería' => [7],
        ];
        $unit = $this->faker->randomElement(array_keys($data));
        return [
            'id' => $data[$unit][0],
            'name' => $unit,
        ];
    }
}
