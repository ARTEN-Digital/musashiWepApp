<?php

namespace Database\Seeders;

use App\Models\Topics;
use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topics::factory()
            ->count(5)
            ->create();
    }
}
