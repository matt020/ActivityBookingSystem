<?php

use App\Models\User;
use App\Models\Activity;
use App\Models\ActivityType;
use Livewire\Livewire;
use App\Livewire\ActivityFilter;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function() {
    $sportType = ActivityType::create([
        'name' => 'Sport',
        'image_path' => '/activity-types/sport.jpg'
    ]);

    $musicType = ActivityType::create([
        'name' => 'Music',
        'image_path' => '/activity-types/music.jpg'
    ]);

    $this->activityTypes = collect([$sportType, $musicType]);

    $this->activities = collect([
        Activity::create([
            'name' => 'Tennis Lesson',
            'activity_type_id' => $sportType->id,
        ]),
        Activity::create([
            'name' => 'Guitar Lesson',
            'activity_type_id' => $musicType->id,
        ])
    ]);
});

test('activities displayed on activities page', function () {
    $response = $this->get('/activities');
    $response->assertStatus(200);
    $response->assertSee($this->activities[0]->name);
    $response->assertSee($this->activities[1]->name);
});

test('activities displayed on dashboard activities page', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $response = $this->get('/dashboard/activities');
    $response->assertStatus(200);
    $response->assertSee($this->activities[0]->name);
    $response->assertSee($this->activities[1]->name);
});

test('activities filtered on activities page', function () {
    Livewire::test(ActivityFilter::class)
        ->set('selectedType', $this->activityTypes[0]->id)
        ->assertSee($this->activities[0]->name)
        ->assertDontSee($this->activities[1]->name);
});

test('activities filtered on dashboard activities page', function () {
    $user = User::factory()->create();
    
    Livewire::actingAs($user)
        ->test(ActivityFilter::class)
        ->set('selectedType', $this->activityTypes[0]->id)
        ->assertSee($this->activities[0]->name)
        ->assertDontSee($this->activities[1]->name);
});