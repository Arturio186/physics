<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'surname' => 'nullable|string',
            'name' => 'nullable|string',
            'mid_name' => 'nullable|string',
            'birthdate' => 'nullable|date',
            'email' => 'nullable|email|unique:users,email,'.$user->id,
            'phone_number' => 'nullable|string',
            'work_space' => 'nullable|string',
            'study_place' => 'nullable|string',
            'location' => 'nullable|string',
            'rank' => 'nullable|string',
            'sport_role' => ['string', 'required']
        ]);

        $user->update($request->all());

        return redirect()->route('dashboard.index')
            ->with('success', 'Данные успешно обновлены');
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            
            $imageName = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatars'), $imageName);
            
            $user->photo_path = 'avatars/'.$imageName;
            $user->save();
        }

        return redirect()->route('dashboard.index')
        ->with('success', 'Данные успешно обновлены');
    }
}
