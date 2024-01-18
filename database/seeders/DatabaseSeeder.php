<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);

        $this->call(ActivitiesSeeder::class);
        $this->call(AreasSeeder::class);
        $this->call(ChecklistevaluationSeeder::class);
        $this->call(ConceptsSeeder::class);
        $this->call(EquipamentSeeder::class);
        $this->call(ExpirationsSeeder::class);
        $this->call(LevesSeeder::class);
        $this->call(PositionsSeeder::class);
        $this->call(ProcessSeeder::class);
        $this->call(TopicsSeeder::class);
        $this->call(TrainingsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserprocessstatusSeeder::class);
        $this->call(UsertypeSeeder::class);
    }
}
