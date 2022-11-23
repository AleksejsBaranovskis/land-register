<?php

namespace Database\Seeders;

use App\Models\LandUsage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandUsageSeeder extends Seeder
{

    private const LAND_USAGE_TYPE = [
        'agricultural land',
        'woodland',
        'land under waters',
        'built-up area'
    ];

    public function run()
    {
        foreach (self::LAND_USAGE_TYPE as $type) {
            DB::table('land_usages')->insert(['type' => $type]);
        }
    }
}
