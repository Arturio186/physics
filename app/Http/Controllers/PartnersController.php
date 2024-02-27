<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class PartnersController extends Controller
{
    public function index() 
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        return view('main.partners', compact('visits'));
    }
}
