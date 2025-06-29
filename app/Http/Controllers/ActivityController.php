<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $layout = 'layouts.home';
        return view('activities', ['selectedType' => $request->query('type'), 'layout' => $layout]);
    }

    public function dashboardActivities(Request $request)
    {
        $layout = 'layouts.app';
        return view('activities', ['selectedType' => $request->query('type'), 'layout' => $layout]);
    }

    public function dashboardBookings(Request $request)
    {
        $layout = 'layouts.app';
        return view('activities', [
            'layout' => $layout,
            'user' => auth()->user(),
            'selectedType' => $request->query('type')
        ]);
    }
}
