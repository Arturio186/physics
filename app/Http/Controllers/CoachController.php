<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visit;

class CoachController extends Controller
{
    public function all()
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $users = User::where('sport_role', 'coach')->orderBy('surname')->paginate(10);

        return view('main.coach.all', compact('users', 'visits'));
    }

    public function show(User $coach)
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();
        
        return view('main.coach.show', compact('coach', 'visits'));
    }
}
