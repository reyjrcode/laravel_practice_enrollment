<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //php artisan make:factory SubjectFactory --model+Subject
            // {{DOMAIN}}/api/subjects?page=2
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'is_approved' => false,
        ];
    }
}