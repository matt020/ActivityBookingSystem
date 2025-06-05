<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\ActivityType;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            ['name' => 'Badminton Court Match', 'type' => 'Sport'],
            ['name' => 'Yoga Class', 'type' => 'Fitness Class'],
            ['name' => 'Guitar Lesson', 'type' => 'Music'],
        ];
        foreach ($activities as $activity) {
            $activityType = ActivityType::where('name', $activity['type'])->first();
            Activity::firstOrCreate(
                    ['name' => $activity['name']],
                    ['activity_type_id' => $activityType->id]
            );
        }
    }
}
