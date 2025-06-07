<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('home route resolves to activity types page', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertViewIs('activity-types');
});

test('guests can visit the home page', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('authenticated users can visit the home page', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $response = $this->get('/');
    $response->assertStatus(200);
});
