<?php

namespace Database\Seeders;

use App\Models\Concepts;
use Illuminate\Database\Seeder;

class ConceptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Concepts::factory()
            ->count(5)
            ->create();
    }
}
