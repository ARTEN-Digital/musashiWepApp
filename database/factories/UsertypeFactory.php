<?php

namespace Database\Factories;

use App\Models\Usertype;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsertypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usertype::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'user_type' => $this->faker->text(),
        // ];

        // Define tus unidades personalizadas y sus valores aquí
        $data = [
            'Administrador' => [1],
            'Capacitador' => [2],
            'Líder' => [3],
            'Evaluador' => [4],
            'Operador' => [5],
        ];
        // Selecciona una unidad aleatoria
        $unit = $this->faker->randomElement(array_keys($data));
        return [
            'id' => $data[$unit][0],
            'name' => $unit,
        ];
    }
}
