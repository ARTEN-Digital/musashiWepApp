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
            'name' => $this->faker->text(),
            'id_process' => \App\Models\Process::factory(),
            'id_expirations' => \App\Models\Expirations::factory(),
        ];
    }
}
