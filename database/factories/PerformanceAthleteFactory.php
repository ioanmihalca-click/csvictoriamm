<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PerformanceAthlete>
 */
class PerformanceAthleteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $backgroundColors = ['bg-blue-50', 'bg-green-50', 'bg-pink-50', 'bg-yellow-50', 'bg-purple-50'];

        return [
            'name' => fake()->name(),
            'photo_url' => null,
            'background_color' => fake()->randomElement($backgroundColors),
            'is_active' => true,
            'order' => fake()->numberBetween(0, 100),
        ];
    }
}
