<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Activity;
use App\Models\ActivityBooking;
use Illuminate\Database\Seeder;

class ActivityBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', env('TEST_USER_EMAIL'))->first();
        $activities = Activity::all();

        foreach($activities->take(2) as $activity) {
            ActivityBooking::create([
                'user_id' => $user->id,
                'activity_id' => $activity->id
            ]);
        }
    }
}
