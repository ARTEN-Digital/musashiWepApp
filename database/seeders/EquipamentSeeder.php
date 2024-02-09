<?php

namespace Database\Seeders;

use App\Models\Equipament;
use Illuminate\Database\Seeder;

class EquipamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipament::factory()
            ->count(10)
            ->create();
    }
}
