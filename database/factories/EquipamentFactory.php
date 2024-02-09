<?php

namespace Database\Factories;

use App\Models\Equipament;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipament::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
