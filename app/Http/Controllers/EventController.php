<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\GalleryItem;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
        ]);

        Event::create([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('events.index')->with('success', 'Мероприятие успешно создано.');
    }

    public function show(Event $event)
    {
        $photos = $event->galleryItems()->where('type', 'photo')->get();
        $videos = $event->galleryItems()->where('type', 'video')->get();
        
        return view('events.show', compact('event', 'photos', 'videos'));
    }

    public function showGallery(Event $event)
    {
        $photos = $event->galleryItems()->where('type', 'photo')->get();
        $videos = $event->galleryItems()->where('type', 'video')->get();
        
        return view('events.show', compact('event', 'photos', 'videos'));
    }
    

    public function uploadToGallery(Request $request, Event $event)
    {
        $request->validate([
            'type' => 'required|in:photo,video',
        ]);
    
        if ($request->input('type') === 'photo') {
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            ]);
    
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
    
            $event->galleryItems()->create([
                'filename' => $filename,
                'type' => 'photo',
            ]);
        } elseif ($request->input('type') === 'video') {
            $request->validate([
                'videoUrl' => 'required|url',
            ]);
    
            $event->galleryItems()->create([
                'filename' => $request->input('videoUrl'),
                'type' => 'video',
            ]);
        }
    
        return back()->with('success', 'Материал успешно загружен в галерею мероприятия.');
    }
    
}
