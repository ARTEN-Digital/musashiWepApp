<?php

namespace Database\Seeders;

use App\Models\Leves;
use Illuminate\Database\Seeder;

class LevesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Leves::factory()
            ->count(5)
            ->create();
    }
}
