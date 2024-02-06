<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Video;

class VideoController extends Controller
{
    public function index(Event $event)
    {  
        return view('main.videos.index', compact('event'));
    }

    public function add(Event $event)
    {
        return view('main.videos.add', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'video_link' => ['required', 'string']
        ]);

        Video::create([
            'event_id' => $event->id,
            'title' => $request->title,
            'video_link' => $request->video_link
        ]);

        return redirect()->route('events.videos.index', $event);
    }

    public function destroy(Event $event, Video $video)
    {
        $video->delete();

        return redirect()->route('events.videos.index', $event);
    }

    public function edit(Event $event, Video $video)
    {
        return view('main.videos.edit', compact('event', 'video'));
    }

    public function update(Request $request, Event $event, Video $video)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'video_link' => ['required', 'string']
        ]);

        $video->update([
            'title' => $request->title,
            'video_link' => $request->video_link
        ]);

        return redirect()->route('events.videos.index', $event);
    }
}
