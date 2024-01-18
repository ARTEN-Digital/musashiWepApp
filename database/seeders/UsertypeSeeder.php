<?php

namespace Database\Seeders;

use App\Models\Usertype;
use Illuminate\Database\Seeder;

class UsertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usertype::factory()
            ->count(5)
            ->create();
    }
}
