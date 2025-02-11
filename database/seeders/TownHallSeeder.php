<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TownHall;

class TownHallSeeder extends Seeder
{
    public function run()
    {
        TownHall::create([
            'level' => 1,
        ]);

        TownHall::create([
            'level' => 2,
        ]);
    }
}