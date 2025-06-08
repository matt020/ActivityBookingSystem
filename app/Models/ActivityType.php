<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ActivityType extends Model
{
    protected $fillable = [
        'name',
        'image_path'
    ];

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
