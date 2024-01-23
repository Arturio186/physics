<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show() 
    {
        $user = Auth::user();
        return view('main.dashboard.dashboard', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('main.dashboard.dashboard_edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'surname' => 'required|string',
            'name' => 'required|string',
            'mid_name' => 'nullable|string',
            'birthdate' => 'required|date',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone_number' => 'required|string',
            'work_space' => 'nullable|string',
            'study_place' => 'nullable|string',
        ]);

        $user->update($request->all());

        return redirect()->route('dashboard.index', $user->id)
            ->with('success', 'Данные успешно обновлены');
    }
}
