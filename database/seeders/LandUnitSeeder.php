<?php

namespace Database\Seeders;

use App\Models\LandUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandUnitSeeder extends Seeder
{
    public function run()
    {
        LandUnit::factory(15)->create();
    }
}
