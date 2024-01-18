<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Userprocessstatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserprocessstatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Userprocessstatus::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->text(),
            'user_id' => \App\Models\User::factory(),
            'process_id' => \App\Models\Process::factory(),
        ];
    }
}
