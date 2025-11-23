<?php

namespace Database\Seeders;

use App\Models\PerformanceAthlete;
use Illuminate\Database\Seeder;

class PerformanceAthleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $athletes = [
            // Sportivi existenți
            ['name' => 'Timeea Benzar', 'background_color' => 'bg-blue-50', 'is_active' => true, 'order' => 1],
            ['name' => 'Ema Recalo', 'background_color' => 'bg-green-50', 'is_active' => true, 'order' => 2],
            ['name' => 'Alexandru Taut', 'background_color' => 'bg-green-50', 'is_active' => true, 'order' => 3],
            ['name' => 'Vladimyr Benzar', 'background_color' => 'bg-blue-50', 'is_active' => true, 'order' => 4],
            ['name' => 'Sergiu Ciontos', 'background_color' => 'bg-green-50', 'is_active' => true, 'order' => 5],
            ['name' => 'Ramona Rozovlean', 'background_color' => 'bg-green-50', 'is_active' => true, 'order' => 6],
            ['name' => 'Daria Curac', 'background_color' => 'bg-pink-50', 'is_active' => true, 'order' => 7],
            ['name' => 'Alexandru Nemzet', 'background_color' => 'bg-blue-50', 'is_active' => true, 'order' => 8],

            // Sportivi noi adăugați
            ['name' => 'Luis Pintea', 'background_color' => 'bg-yellow-50', 'is_active' => true, 'order' => 9],
            ['name' => 'Cristian Rezmuves', 'background_color' => 'bg-purple-50', 'is_active' => true, 'order' => 10],
            ['name' => 'Alex Aldea', 'background_color' => 'bg-blue-50', 'is_active' => true, 'order' => 11],
            ['name' => 'Darius Pricop', 'background_color' => 'bg-green-50', 'is_active' => true, 'order' => 12],
            ['name' => 'Naomi Rostaș', 'background_color' => 'bg-pink-50', 'is_active' => true, 'order' => 13],
            ['name' => 'Marcu Pava', 'background_color' => 'bg-blue-50', 'is_active' => true, 'order' => 14],
            ['name' => 'Emanuel Stoica', 'background_color' => 'bg-yellow-50', 'is_active' => true, 'order' => 15],
            ['name' => 'Mateo Szabo', 'background_color' => 'bg-purple-50', 'is_active' => true, 'order' => 16],
            ['name' => 'Andreea Ileș', 'background_color' => 'bg-pink-50', 'is_active' => true, 'order' => 17],
            ['name' => 'Kristina Zon', 'background_color' => 'bg-pink-50', 'is_active' => true, 'order' => 18],
            ['name' => 'Ionut Gaborean', 'background_color' => 'bg-green-50', 'is_active' => true, 'order' => 19],
            ['name' => 'Iosif Dana', 'background_color' => 'bg-blue-50', 'is_active' => true, 'order' => 20],
            ['name' => 'Ioana Ardelean', 'background_color' => 'bg-pink-50', 'is_active' => true, 'order' => 21],
            ['name' => 'Ioana Lahner', 'background_color' => 'bg-pink-50', 'is_active' => true, 'order' => 22],
        ];

        foreach ($athletes as $athlete) {
            PerformanceAthlete::create($athlete);
        }
    }
}
