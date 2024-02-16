<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CoachController extends Controller
{
    public function all()
    {
        $users = User::where('sport_role', 'coach')->orderBy('surname')->paginate(10);

        return view('main.coach.all', compact('users'));
    }

    public function show(User $coach)
    {
        return view('main.coach.show', compact('coach'));
    }
}
