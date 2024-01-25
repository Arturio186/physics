<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;

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
        return view('main.tournaments.show', compact('tournament'));
    }
}
