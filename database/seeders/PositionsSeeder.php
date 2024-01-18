<?php

namespace Database\Seeders;

use App\Models\Positions;
use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Positions::factory()
            ->count(5)
            ->create();
    }
}
