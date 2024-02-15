<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Areas;
use App\Models\Activities;
use App\Models\Process;

class RelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i < 16; $i++) { 
            DB::table('areas_process')->insert([
                'id_areas' => Areas::inRandomOrder()->first()->id,
                'id_process' => Process::inRandomOrder()->first()->id,
            ]);
        }

        for($i=0; $i < 16; $i++) { 
            DB::table('activities_process')->insert([
                'id_activities' => Activities::inRandomOrder()->first()->id,
                'id_process' => Process::inRandomOrder()->first()->id,
            ]);
        }
    }
}
