<?php

use App\Models\User;
use App\Models\Activity;
use App\Models\ActivityBooking;
use App\Models\ActivityType;
use Livewire\Livewire;
use App\Livewire\ActivityFilter;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function() {
    $this->user = User::factory()->create();
    
    $activityType = ActivityType::create([
        'name' => 'Sport',
        'image_path' => '/activity-types/sport.jpg'
    ]);
    
    $this->activities = collect([
        Activity::create([
            'name' => 'Tennis Lesson',
            'activity_type_id' => $activityType->id,
        ]),
        Activity::create([
            'name' => 'Football Lesson',
            'activity_type_id' => $activityType->id,
        ]),
        Activity::create([
            'name' => 'Athletics Training',
            'activity_type_id' => $activityType->id,
        ])
    ]);
    
    $this->bookings = collect([
        ActivityBooking::create([
            'user_id' => $this->user->id,
            'activity_id' => $this->activities[0]->id
        ]),
        ActivityBooking::create([
            'user_id' => $this->user->id,
            'activity_id' => $this->activities[1]->id
        ])
    ]);
});

test('dashboard bookings resolves to activities page when authenticated', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $response = $this->get('/dashboard');
    $response->assertStatus(200);
    $response->assertViewIs('activity-types');
});

test('guests are redirected to the login page', function() {
    $response = $this->get('/dashboard/bookings');
    $response->assertRedirect('/login');
});

test('user can see their bookings', function() {
    $response = $this->actingAs($this->user)->get('/dashboard/bookings');
    $response->assertStatus(200);
    $response->assertSee($this->activities[0]->name);
    $response->assertSee($this->activities[1]->name);
    $response->assertDontSee($this->activities[2]->name);
});

test('user can book an activity', function() {
    Livewire::actingAs($this->user)
        ->test(ActivityFilter::class)
        ->call('bookActivity', $this->activities[2]->id);
    
    $this->assertTrue(
        $this->user->activities()->where('activity_id', $this->activities[2]->id)->exists()
    );
});

test('user can cancel a booking', function() {
    Livewire::actingAs($this->user)
        ->test(ActivityFilter::class)
        ->call('cancelBooking', $this->activities[0]->id);
    
    $this->assertFalse(
        $this->user->activities()->where('activity_id', $this->activities[0]->id)->exists()
    );
});

test('guests cannot book activities', function() {
    $response = Livewire::test(ActivityFilter::class)
        ->call('bookActivity', $this->activities[2]->id);
        
    $response->assertRedirect('/login');
});

test('guests cannot cancel bookings', function() {
    $response = Livewire::test(ActivityFilter::class)
        ->call('cancelBooking', $this->activities[0]->id);
        
    $response->assertRedirect('/login');
});
