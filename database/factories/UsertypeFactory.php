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
        return [
            'user_type' => $this->faker->text(),
        ];
    }
}
