<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visit;

class SportsmanController extends Controller
{
    public function all()
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $users = User::where('sport_role', 'sportsman')->orderBy('surname')->paginate(10);

        return view('main.sportsmen.all', compact('users', 'visits'));
    }

    public function show(User $sportsman)
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        return view('main.sportsmen.show', compact('sportsman', 'visits'));
    }
}
