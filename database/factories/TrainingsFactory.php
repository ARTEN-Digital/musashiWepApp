<?php

namespace Database\Factories;

use App\Models\Trainings;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trainings::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'training' => $this->faker->text(),
            'process_id' => \App\Models\Process::factory(),
            'expirations_id' => \App\Models\Expirations::factory(),
        ];
    }
}
