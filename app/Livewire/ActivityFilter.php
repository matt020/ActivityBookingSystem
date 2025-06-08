<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\User;

class ActivityFilter extends Component
{
    public $activityTypes;
    public $selectedType = null;
    public ?User $user = null;

    public function mount($type = null, $user = null)
    {
        $this->activityTypes = ActivityType::all();
        $this->selectedType = $type;
        $this->user = $user;
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
}
