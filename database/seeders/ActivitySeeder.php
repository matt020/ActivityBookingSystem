<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = ['Badminton Court Match', 'Yoga Class', 'Guitar Lesson'];
        foreach ($activities as $activity) {
            Activity::firstOrCreate(['name' => $activity]);
        }
    }
}
