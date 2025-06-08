<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ActivityFilter extends Component
{
    public $activityTypes;
    public $selectedType = null;
    public ?User $user = null;
    public bool $isBookingsPage = false;
    public bool $isDashboard = false;

    public function mount($type = null, $user = null)
    {
        $this->activityTypes = ActivityType::all();
        $this->selectedType = $type;
        $this->user = $user;
        $this->isBookingsPage = request()->routeIs('dashboard.bookings');
        $this->isDashboard = str_starts_with(request()->route()->getName(), 'dashboard');
    }

    public function render()
    {
        $query = Activity::query();

        if ($this->selectedType) {
            $query->where('activity_type_id', $this->selectedType);
        }

        if ($this->user) {
            $query->whereHas('users', function ($q) {
                $q->where('users.id', $this->user->id);
            });
        }

        return view('livewire.activity-filter', [
            'activities' => $query->get(),
        ]);
    }

    public function bookActivity($activityId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $activity = Activity::findOrFail($activityId);
        auth()->user()->activities()->attach($activityId);
    }

    public function cancelBooking($activityId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $activity = Activity::findOrFail($activityId);
        auth()->user()->activities()->detach($activityId);
    }
}
