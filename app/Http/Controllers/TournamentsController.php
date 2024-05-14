<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Team;
use App\Models\Referee;
use Illuminate\Support\Facades\Auth;
use App\Models\Visit;

class TournamentsController extends Controller
{
    public function active()
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $tournaments = Tournament::where('is_active', true)
            ->orderBy('start_date', 'desc')
            ->get();

        return view('main.tournaments.active', compact('tournaments', 'visits'));
    }

    public function completed() 
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $tournaments = Tournament::where('is_active', false)
            ->orderBy('start_date', 'desc')
            ->get();

        return view('main.tournaments.completed', compact('tournaments', 'visits'));
    }

    public function show(Tournament $tournament)
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

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
        // hotfix для турика с детьми, в идеале переделать
        $secondTeams = $tournament->teams->where('gender', 'second');
        $thirdTeams =  $tournament->teams->where('gender', 'third');

        return view('main.tournaments.show', compact('tournament', 'isInTeam', 'referees', 'mensTeams', 'womensTeams', 'visits', 'secondTeams', 'thirdTeams'));
    }
}
