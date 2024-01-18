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
        return [
            'area' => $this->faker->text(),
        ];
    }
}
