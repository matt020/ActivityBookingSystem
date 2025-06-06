<?php

namespace App\Http\Controllers;

use App\Models\ActivityType;
use Illuminate\Http\Request;

class ActivityTypeController extends Controller
{
    public function index()
    {
        $activityTypes = ActivityType::all();
        $layout = 'layouts.home';
        return view('activity-types', compact('activityTypes', 'layout'));
    }

    public function dashboard()
    {
        $activityTypes = ActivityType::all();
        $layout = 'layouts.app';
        return view('activity-types', compact('activityTypes', 'layout'));
    }
}
