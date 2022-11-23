<?php

namespace Database\Factories;

use App\Models\LandProperty;
use App\Models\LandUsage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LandUnitFactory extends Factory
{
    public function definition()
    {
        return [
            'land_property_id' => rand(1, LandProperty::count()),
            'land_usage_id' => rand(null, LandUsage::count()),
            'cadastral_nr' => fake()->numberBetween(9999999999, 100000000000),
            'total_area(ha)' => fake()->randomFloat(2, 0, 50),
            'measurement_date' => fake()->date
        ];
    }
}
