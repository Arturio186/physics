<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    public function show(Team $team)
    {
        return view('main.teams.show', compact('team'));
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $tournament = Tournament::find($request->input('tournament_id'));

        return view('main.teams.add', compact('user', 'tournament'));
    }

    public function store(Request $request)
    {
        $creator = Auth::user();

        $request->validate([
            'team_name' => ['string', 'required'],
            'player_number' => ['int', 'required'],
            'tournament_id' => ['int', 'required'],
            'main_form' => ['string', 'required'],
            'second_form' => ['string', 'required'],
            'coach_name' => ['string', 'required'],
            'coach_surname' => ['string', 'required'],
            'coach_midname' => ['string', 'required'],
            'coach_phone' => ['string', 'required'],
            'coach_email' => ['required', 'email'],
            'gender' => ['required', 'string']
        ]);

        $team = Team::create([
            'name' => $request->team_name,
            'creator_id' => $creator->id,
            'tournament_id' => $request->tournament_id,
            'main_form' => $request->main_form,
            'second_form' => $request->second_form,
            'coach_name' => $request->coach_name,
            'coach_surname' => $request->coach_surname,
            'coach_midname' => $request->coach_midname,
            'coach_phone' => $request->coach_phone,
            'coach_email' => $request->coach_email,
            'gender' => $request->gender
        ]);
        
        $team->players()->attach($creator, ['player_number' => $request->player_number]);

        return redirect()->route('tournaments.show', $request->tournament_id);
    }

    public function invite(Team $team)
    {
        $isInTeam = false;

        foreach ($team->tournament->teams as $team)
        {
            if ($team->players->contains(Auth::user()->id))
            {
                $isInTeam = true;
                break;
            }
        }   

        return view('main.teams.invite', compact('team', 'isInTeam'));
    }

    public function join(Request $request) 
    {
        $request->validate([
            'team_id' => ['required', Rule::exists('teams', 'id')],
            'player_number' => ['int', 'required']
        ]);

        $team = Team::find($request->team_id);

        foreach ($team->tournament->teams as $team)
        {
            if ($team->players->contains(Auth::user()->id))
            {
                return redirect()->route('tournaments.show', $team->tournament->id);
            }
        }   

        if (!$team->players()->where('user_id', Auth::user()->id)->exists()) {
            $team->players()->attach(Auth::user()->id, ['player_number' => $request->player_number]);
        }

        return redirect()->route('tournaments.show', $team->tournament->id);
    }

    public function out(Request $request, Team $team)
    {
        if ($team->players()->where('user_id', Auth::user()->id)->exists()) {
            $team->players()->detach(Auth::user()->id);
        }

        return redirect()->route('tournaments.show', $team->tournament->id);
    }
}
