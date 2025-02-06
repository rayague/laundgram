<?php

namespace Database\Seeders;

use App\Models\OpeningHour;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OpeningHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'
        ];

        foreach ($days as $day) {
            OpeningHour::create([
                'day' => $day,
                'start_time' => '08:00',
                'end_time' => '18:00',
                'status' => 'open',
            ]);
        }
    }
}