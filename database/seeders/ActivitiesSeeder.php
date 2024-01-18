<?php

namespace Database\Seeders;

use App\Models\Activities;
use Illuminate\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activities::factory()
            ->count(5)
            ->create();
    }
}
