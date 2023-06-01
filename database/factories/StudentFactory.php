<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'identification_document' => fake()->numerify('###########'),
            'document_type' =>fake()->numberBetween(1,3),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'photo' =>fake()->imageUrl(),
            ];
    }
}
