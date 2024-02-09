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
        return [
            'name' => $this->faker->word(),
        ];
    }
}
