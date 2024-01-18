<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Userprocessstatus;

class UserprocessstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Userprocessstatus::factory()
            ->count(5)
            ->create();
    }
}
