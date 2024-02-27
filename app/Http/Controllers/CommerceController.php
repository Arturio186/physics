<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commerce;
use App\Models\Visit;

class CommerceController extends Controller
{
    public function index()
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $commerce = Commerce::all();

        return view('main.commerce', compact('commerce', 'visits'));
    }
}
