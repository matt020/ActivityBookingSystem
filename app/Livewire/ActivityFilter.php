<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Activity;
use App\Models\ActivityType;

class ActivityFilter extends Component
{
    public $activityTypes;
    public $selectedType = null;

    public function mount($type = null)
    {
        $this->activityTypes = ActivityType::all();
        $this->selectedType = $type;
    }

    public function render()
    {
        $activities = $this->selectedType
            ? Activity::where('activity_type_id', $this->selectedType)->get()
            : Activity::all();

        return view('livewire.activity-filter', [
            'activities' => $activities,
        ]);
    }

}
