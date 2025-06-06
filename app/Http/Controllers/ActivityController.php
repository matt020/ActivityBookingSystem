<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        return view('activities', [
            'selectedType' => $request->query('type')
        ]);
    }
}
