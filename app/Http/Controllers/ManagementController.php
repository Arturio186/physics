<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;

class ManagementController extends Controller
{
    public function index() 
    {
        $managers = Manager::all();

        return view('main.management', compact('manangers'));
    }
}
