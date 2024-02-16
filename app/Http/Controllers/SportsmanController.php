<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SportsmanController extends Controller
{
    public function all()
    {
        $users = User::where('sport_role', 'sportsman')->orderBy('surname')->paginate(10);

        return view('main.sportsmen.all', compact('users'));
    }

    public function show(User $sportsman)
    {
        return view('main.sportsmen.show', compact('sportsman'));
    }
}
