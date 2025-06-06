<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityType;

class ActivityTypeController extends Controller
{
    public function index()
    {
        $activityTypes = ActivityType::all();
        return view('welcome', compact('activityTypes'));
    }

    public function dashboard()
    {
        $activityTypes = ActivityType::all();
        return view('dashboard', compact('activityTypes'));
    }
}
