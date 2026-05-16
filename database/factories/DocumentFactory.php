<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
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
            'name' => fake()->word(),
            'type' => 'cv',
            'path' => 'documents/test.pdf',
        ];
    }
}
