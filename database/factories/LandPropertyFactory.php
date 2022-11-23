<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LandProperty>
 */
class LandPropertyFactory extends Factory
{

    public function definition()
    {
        return [
            'user_id' => rand(1, User::count()),
            'name' => fake()->address,
            'cadastral_nr' => fake()->unique()->numberBetween(9999999999, 100000000000),
            'status' => rand(1, 4)
        ];
    }
}
