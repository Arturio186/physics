<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryItem;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = GalleryItem::where('type', 'photo')->get();
        $videos = GalleryItem::where('type', 'video')->get();

        return view('gallery.index', compact('photos', 'videos'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,mp4,avi,mov,qt|max:20480',
            'type' => 'required|in:photo,video',
        ]);

        $file = $request->file('file');
        $type = $request->input('type');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

        GalleryItem::create([
            'filename' => $filename,
            'type' => $type,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Файл успешно загружен.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
        ]);

        $galleryItem = GalleryItem::findOrFail($id);
        $galleryItem->update([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('gallery.index')->with('success', 'Данные успешно обновлены.');
    }

    public function destroy(Request $request, $id)
    {
        $galleryItem = GalleryItem::findOrFail($id);
        $eventId = $galleryItem->event_id;
        $galleryItem->delete();

        return redirect()->route('events.show', ['event' => $eventId])->with('success', 'Элемент галереи успешно удален.');
    }
}
