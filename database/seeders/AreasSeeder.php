<?php

namespace Database\Seeders;

use App\Models\Areas;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Areas::factory()
            ->count(5)
            ->create();
    }
}
