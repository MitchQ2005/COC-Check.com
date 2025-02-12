<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TownHall;

class TownHallSeeder extends Seeder
{
    public function run()
    {
        // Create entries for Town Hall levels 1 to 17
        for ($level = 1; $level <= 17; $level++) {
            TownHall::create([
                'level' => $level,
            ]);
        }
    }
}