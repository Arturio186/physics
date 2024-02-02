<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Referee;
use App\Models\Tournament;

class RefereeController extends Controller
{
    public function add(Tournament $tournament)
    {
        $referees = Referee::all();
        return view('main.tournaments.addReferee', compact('tournament', 'referees'));
    }

    public function store(Request $request, Tournament $tournament)
    {
        $validatedData = $request->validate([
            'referee_id' => 'required|exists:referees,id',
        ]);

        return redirect()->route('tournaments.show', ['tournament' => $tournament->id])
            ->with('success', 'Судья добавлен');
    }
}

