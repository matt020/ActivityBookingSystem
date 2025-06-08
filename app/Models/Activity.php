<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'activity_type_id'
    ];
    
    public function activityType()
    {
        return $this->belongsTo(ActivityType::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'activity_bookings')
                    ->withTimestamps();
    }
}
