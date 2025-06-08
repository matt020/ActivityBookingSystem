<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'activity_type_id'
    ];
    
    public function activityType(): BelongsTo
    {
        return $this->belongsTo(ActivityType::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'activity_bookings')
                    ->withTimestamps();
    }
}
