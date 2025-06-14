<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('event', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('events.show', compact('event'));
    }

    public function create()
{
    return view('admin.eventCreate'); // pastikan kamu buat file ini nanti
}

public function store(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:events,slug',
        'deskripsi' => 'required|string',
        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = $request->file('gambar')->store('events', 'public');

    Event::create([
        'judul' => $validated['judul'],
        'slug' => Str::slug($validated['slug']),
        'deskripsi' => $validated['deskripsi'],
        'gambar' => $path,
    ]);

    return redirect('/event')->with('success', 'Event berhasil ditambahkan!');
}

}
