<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\ActivityController;

Route::get('/', [ActivityTypeController::class, 'index'])
    ->name('home');

Route::get('dashboard', [ActivityTypeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('activities', [ActivityController::class, 'index'])
    ->name('activities');

Route::get('dashboard/activities', [ActivityController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.activities');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
});

require __DIR__.'/auth.php';
