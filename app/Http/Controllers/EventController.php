<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\GalleryItem;
use App\Models\EventDay;
use App\Models\Visit;

class EventController extends Controller
{
    public function index()
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $events = Event::all();
        return view('events.index', compact('events', 'visits'));
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

    public function show(EventDay $EventDay)
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $photos = $EventDay->galleryItems();
        
        return view('events.show', compact('EventDay', 'visits'));
    }

    public function showGallery(Event $event)
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $photos = $event->galleryItems()->where('type', 'photo')->get();
        $videos = $event->galleryItems()->where('type', 'video')->get();
        
        return view('events.show', compact('event', 'photos', 'videos', 'visits'));
    }
    

    public function uploadGallery(Request $request, EventDay $event)
    {
        $request->validate([
            'file.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);
    
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
    
                $event->galleryItems()->create([
                    'filename' => $filename,
                    'type' => 'photo',
                ]);
            }
        }
    
        return back()->with('success', 'Фотографии успешно загружены в галерею мероприятия.');
    }

    public function showDays(Event $event)
    {
        $pageUrl = request()->path();
        $visits = Visit::where('page_url', $pageUrl)->count();

        $days = $event->days;
        return view('events.subcategory', compact('event', 'days', 'visits'));
    }
    
    public function storeDays(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string',
        ]);
        
        $event->days()->create([
            'title' => $request->input('title'),
        ]);
        
        return redirect()->route('events.days', $event)->with('success', 'Категория успешно добавлена.');
    }

    public function destroyDays(Request $request, Event $event, EventDay $EventDay)
    {
        $EventDay->delete();
        
        return redirect()->route('events.days', $event)->with('success', 'Категория успешно удалена.');
    }
        
    public function deleteGalleryItem(GalleryItem $galleryItem)
    {
        $galleryItem->delete();

        return redirect()->back()->with('success', 'Фотография успешно удалена из галереи мероприятия.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index');
    }
}
