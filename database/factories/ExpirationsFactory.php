<?php

namespace Database\Factories;

use App\Models\Expirations;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpirationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expirations::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
