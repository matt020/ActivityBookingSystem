<?php

use App\Models\User;
use App\Models\ActivityType;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function() {
    $this->activityTypes = [
        ActivityType::create([
            'name' => 'Sport',
            'image_path' => '/activity-types/sport.jpg'
        ]),
        ActivityType::create([
            'name' => 'Music',
            'image_path' => '/activity-types/music.jpg'
        ])
    ];
});

test('activity types displayed on home page', function () {
    $response = $this->get(route('home'));
    assertActivityTypesVisible($response);
});

test('activity types displayed on dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $response = $this->get(route('dashboard'));
    assertActivityTypesVisible($response);
});

function assertActivityTypesVisible($response) {
    $response->assertStatus(200);
    $response->assertSee('Sport');
    $response->assertSee('Music');
    $response->assertSee('/activity-types/sport.jpg');
    $response->assertSee('/activity-types/music.jpg');
}
