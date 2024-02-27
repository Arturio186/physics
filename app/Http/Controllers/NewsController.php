<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Visit;

class NewsController extends Controller
{
    public function index()
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $news = News::orderBy('date', 'desc')->paginate(10);

        return view('main.news.all', compact('news', 'visits'));
    }

    public function show(News $news) 
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        return view('main.news.show', compact('news', 'visits'));
    }
}
