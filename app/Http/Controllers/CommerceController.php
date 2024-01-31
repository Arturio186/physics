<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commerce;

class CommerceController extends Controller
{
    public function index()
    {
        $commerce = Commerce::all();

        return view('main.commerce', compact('commerce'));
    }
}
