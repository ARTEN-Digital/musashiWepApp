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
            'concept' => $this->faker->text(),
            'id_topics' => \App\Models\Topics::factory(),
            'id_user' => \App\Models\User::factory(),
        ];
    }
}
