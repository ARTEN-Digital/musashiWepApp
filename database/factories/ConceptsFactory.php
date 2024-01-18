<?php

namespace Database\Factories;

use App\Models\Concepts;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConceptsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Concepts::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'concepts' => $this->faker->text(),
            'topics_id' => \App\Models\Topics::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
