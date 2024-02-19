<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Team;
use App\Models\Referee;
use Illuminate\Support\Facades\Auth;

class TournamentsController extends Controller
{
    public function active()
    {
        $tournaments = Tournament::where('is_active', true)
            ->orderBy('start_date', 'desc')
            ->get();

        return view('main.tournaments.active', compact('tournaments'));
    }

    public function completed() 
    {
        $tournaments = Tournament::where('is_active', false)
            ->orderBy('start_date', 'desc')
            ->get();

        return view('main.tournaments.completed', compact('tournaments'));
    }

    public function show(Tournament $tournament)
    {
        $isInTeam = false;
        if (Auth::user()) {
            foreach ($tournament->teams as $team)
            {
                if ($team->players->contains(Auth::user()->id))
                {
                    $isInTeam = true;
                    break;
                }
            }
        }

        $referees = Referee::where('tournament_id', $tournament->id)->get();

        $mensTeams = $tournament->teams->where('gender', 'male');
        $womensTeams = $tournament->teams->where('gender', 'female');

        return view('main.tournaments.show', compact('tournament', 'isInTeam', 'referees', 'mensTeams', 'womensTeams'));
    }
}
