<?php

namespace Database\Seeders;

use App\Models\LandProperty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandPropertySeeder extends Seeder
{
    public function run()
    {
        LandProperty::factory(10)->create();
    }
}
