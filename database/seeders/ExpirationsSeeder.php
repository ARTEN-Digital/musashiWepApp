<?php

namespace Database\Seeders;

use App\Models\Expirations;
use Illuminate\Database\Seeder;

class ExpirationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expirations::factory()
            ->count(5)
            ->create();
    }
}
