<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Checklistevaluation;

class ChecklistevaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Checklistevaluation::factory()
            ->count(5)
            ->create();
    }
}
