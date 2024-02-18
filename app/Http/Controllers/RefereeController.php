<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Referee;
use App\Models\Tournament;
use App\Models\Categories;

class RefereeController extends Controller
{
    public function add(Tournament $tournament)
    {
        $categories = Categories::all();

        return view('main.tournaments.addReferee', compact('tournament', 'categories'));
    }

    public function store(Request $request, Tournament $tournament)
    {
        $validatedData = $request->validate([
            'surname' => ['required', 'string'],
            'name' => ['required', 'string'],
            'midname' => ['required', 'string'],
            'category_id' => 'required|exists:categories,id',
        ]);

        Referee::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'midname' => $request->midname,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'category_id' => $request->category_id,
            'tournament_id' => $tournament->id
        ]);

        return redirect()->route('tournaments.show', ['tournament' => $tournament->id])
            ->with('success', 'Судья добавлен');
    }

    public function edit(Tournament $tournament, Referee $referee)
    {
        $categories = Categories::all();

        return view('main.tournaments.editReferee', compact('tournament', 'categories', 'referee'));
    }

    public function update(Request $request, Tournament $tournament, Referee $referee)
    {
        $validatedData = $request->validate([
            'surname' => ['required', 'string'],
            'name' => ['required', 'string'],
            'midname' => ['required', 'string'],
            'category_id' => 'required|exists:categories,id',
        ]);

        $referee->update([
            'surname' => $request->surname,
            'name' => $request->name,
            'midname' => $request->midname,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'category_id' => $request->category_id,
            'tournament_id' => $tournament->id
        ]);

        return redirect()->route('tournaments.show', ['tournament' => $tournament->id])
            ->with('success', 'Данные изменены');
    }

    public function destroy(Tournament $tournament, Referee $referee)
    {
        $referee->delete();

        return redirect()->route('tournaments.show', ['tournament' => $tournament->id])
            ->with('success', 'Судья удален');
    }
}

