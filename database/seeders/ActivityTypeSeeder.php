<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActivityType;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Sport',
                'image_path' => '/activity-types/sport.jpg'
            ],
            [
                'name' => 'Fitness Class',
                'image_path' => '/activity-types/fitness-class.jpg'
            ],
            [
                'name' => 'Music',
                'image_path' => '/activity-types/music-lesson.jpg'
            ]
        ];

        foreach ($types as $type) {
            ActivityType::firstOrCreate([
                'name' => $type['name']
            ], [
                'image_path' => $type['image_path']
            ]);
        }
    }
}
