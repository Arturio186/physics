<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('date', 'desc')->paginate(10);
        return view('main.news.all', compact('news'));
    }

    public function show(News $news) 
    {
        $news->views_counter += 1;
        $news->save();

        return view('main.news.show', compact('news'));
    }
}
