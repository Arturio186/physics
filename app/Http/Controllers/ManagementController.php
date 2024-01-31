<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;

class ManagementController extends Controller
{
    public function index() 
    {
        $managers = Manager::all();
        dd($managers);
        return view('main.management', compact('managers'));
    }
}
