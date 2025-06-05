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
        $types = ['Sport', 'Fitness Class', 'Music'];
        foreach ($types as $type) {
            ActivityType::firstOrCreate(['name' => $type]);
        }
    }
}
