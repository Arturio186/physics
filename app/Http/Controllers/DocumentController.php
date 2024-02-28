<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Visit;

class DocumentController extends Controller
{
    public function index()
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $documents = Document::orderBy('created_at', 'DESC')->get();

        return view('main.documents', compact('documents', 'visits'));
    }
}
