<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\Visit;

class ManagementController extends Controller
{
    public function index() 
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $managers = Manager::all();

        return view('main.management', compact('managers', 'visits'));
    }
}
