<?php

namespace Database\Seeders;

use App\Models\Trainings;
use Illuminate\Database\Seeder;

class TrainingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trainings::factory()
            ->count(5)
            ->create();
    }
}
