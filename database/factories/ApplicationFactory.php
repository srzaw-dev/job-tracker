<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends Factory<Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'company_name' => fake()->company(),
            'role' => fake()->jobTitle(),
            'location' => fake()->city(),
            'status' => 'applied',
            'is_open' => true,
            'date_applied' => fake()->date(),
        ];
    }
}
