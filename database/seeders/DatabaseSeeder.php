<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => env('TEST_USER_EMAIL'),
            'password' => Hash::make(env('TEST_USER_PASSWORD'))
        ]);

        $this->call(ActivityTypeSeeder::class);
        $this->call(ActivitySeeder::class);
    }
}
